<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherCourse;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Roles;
use App\Models\ProfileTeacher;
use App\Models\Courses;
use App\Models\Customer;
use App\Models\Contact;
use App\Models\Blog;
use App\Models\Overview;
use App\Models\Lecture;
use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;
use Mail;
use App\Imports\ExcelImport;
use App\Exports\ExcelExport;
use Excel;

class AdminController extends Controller
{
    // public function AuthLogin(){
    //     $admin_id = Auth::id();
    //     if($admin_id){
    //         return Redirect::to('/admin/dashboard');
    //     }else{
    //         return Redirect::to('/admin')->send();
    //     }
    // }
    public function dashboard(){
        // $this->AuthLogin();
        $count_teacher = Admin::whereNotIn("id", ['1'])->get()->count();
        $count_student = Customer::all()->count();
        $count_contact = Contact::all()->count();
        $count_blog = Blog::all()->count();
        $students = DB::table('customers')
        ->select('customers.id','customers.customer_name','lecture_course.lecture_name','teacher_course.course_id')
        ->distinct()
        ->leftJoin('history_exam','history_exam.student_id','=','customers.id')
        ->join('lecture_course','lecture_course.id','=','history_exam.lecture_id')
        ->join('admin','admin.id','=','lecture_course.teacher_id')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->where('admin.id', Auth::user()->id)
        ->get();
        $students_admin = DB::table('customers')
        ->select('customers.id','customers.customer_name','lecture_course.lecture_name','teacher_course.course_id')
        ->distinct()
        ->leftJoin('history_exam','history_exam.student_id','=','customers.id')
        ->join('lecture_course','lecture_course.id','=','history_exam.lecture_id')
        ->join('admin','admin.id','=','lecture_course.teacher_id')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->get();
        return view('admin.dashboard')->with(compact('count_teacher','count_student','count_contact','count_blog','students','students_admin'));
    }
    public function index(){
        return view('admin_login');
    }
    public function register(){
        return view('admin_register');
    }
    public function admin_register(Request $request){
        $data = $request->validate([
            'admin_name' => 'required|max: 255',
            'admin_phone' => 'required|max: 255',
            'admin_email' => 'required|max: 255',
            'admin_password' => 'required|min: 6|max: 255',
        ]);
        $admin = new Admin();
        $admin->admin_name = $data['admin_name'];
        $admin->admin_phone = $data['admin_phone'];
        $admin->admin_email = $data['admin_email'];
        $admin->admin_password = md5($data['admin_password']);
        $admin->save();
        Toastr::success('Đăng kí thành công!', 'Thành công');
        return redirect("/admin");
    }
    public function admin_dashboard(Request $request) {
        $data = $request->validate([
            "admin_email" => "required|max:255",
            "admin_password" => "required"
        ]);
        if(Auth::attempt(['admin_email' => $request->admin_email, 'admin_password' => $request->admin_password])){
            Toastr::success('Đăng nhập thành công!', 'Thành công');
            return redirect('/admin/dashboard');
        }else{
            Toastr::error('Đăng nhập thất bại!', 'Thất bại');
            return redirect('/admin');
        }
    }
    public function admin_logout(){
        Auth::logout();
        return Redirect::to('/admin');
    }
    public function teacher_assign(){
        if(isset($_POST['assign'])){
            // $teacher_course = new TeacherCourse();
            // $teacher_course->course_id = $_POST['course_id'];
            foreach($_POST['positions'] as $name){
                // $teacher_course->teacher_id = $name;
                DB::insert('insert into teacher_course (course_id, teacher_id) values (?, ?)', [$_POST['course_id'], $name]);
                // DB::table('teacher_course')->insert(
                //     ['course_id' => $_POST['course_id'], 'teacher_id' => $name]
                // );
                Toastr::success('Assign giáo viên thành công!', 'Thành công');
                return redirect()->back(); 
            }
            // $teacher_course->save();
        }
    }
    public function show(){
        $admin = Admin::with('roles')->orderBy('id','DESC')->get();
        return view('admin.teacher.index')->with(compact('admin'));
    }
    public function list(){
        // $admin = Admin::with('roles')->whereNotIn("id", ['1'])->orderBy('id','DESC')->get();
        $teacher = TeacherCourse::with('admin')->whereNotIn("teacher_id", ['1'])->orderBy('id','DESC')->get();
        // $teacher  = DB::table('teacher_course')->join('admin', 'teacher_course.teacher_id ', '=', 'admin.id')->get();
        return view('admin.teacher.list')->with(compact('teacher'));
    }
    public function assign(){
        $courses = Courses::all();
        $teachers = Admin::whereNotIn("id", ['1'])->get();
        return view('admin.teacher.assign')->with(compact('courses','teachers'));;

    }
    public function assign_roles(Request $request){
        $user = Admin::where('admin_email', $request->admin_email)->first();
        $user->roles()->detach();
        if($request->author_role){
            $user->roles()->attach(Roles::where('roles_name', 'author')->first());
        }
        if($request->admin_role){
            $user->roles()->attach(Roles::where('roles_name', 'admin')->first());
        }
        
        $email = $request->admin_email;
        $email_array = array(
            'teacher_name' => $user->admin_name
        );
        if ($email) {
            Mail::send('admin.email.index',['email' => $email,'email_array' => $email_array], function ($m)use ($email)  { 
                $m->to($email)->subject('Your Reminder!');
            });
        }

        Toastr::success('Assign roles thành công!', 'Thành công');
        return redirect()->back();
    }
    public function export_csv(){
        return Excel::download(new ExcelExport , 'question.xlsx');
    }
    public function import_csv(Request $request){
        $path = $request->file('file')->getRealPath();
        Excel::import(new ExcelImport, $path);
        return back();
    }
    public function admin_detail_teacher($id){
        $detail = DB::table('admin')
        ->select('admin.id','admin.admin_name','admin.admin_email','admin.admin_phone','teacher_course.course_id','overview_course.overview_img','profile_teacher.teacher_img','profile_teacher.about','profile_teacher.achievements','profile_teacher.objectives')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->join('overview_course','overview_course.teacher_id','=','admin.id')
        ->join('profile_teacher','profile_teacher.teacher_id','=','admin.id')
        ->where('admin.id',$id)->first();
        $overview = Overview::where('teacher_id', $id)->first();
        $lectures = Lecture::where('teacher_id', $id)->orderBy('id','ASC')->get();
        $question_count = DB::table('lecture_course')
        ->select(DB::raw('COUNT(question_course.id) as question'))
        ->join('question_course','question_course.lecture_id','=','lecture_course.id')
        ->where('lecture_course.teacher_id',$id)->first();
        return view('admin.teacher.edit')->with(compact('detail','overview','lectures','question_count'));
    }
}
