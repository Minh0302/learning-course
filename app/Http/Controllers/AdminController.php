<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherCourse;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Roles;
use App\Models\Courses;
use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;

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
        return view('admin.dashboard');
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
        Toastr::success('Assign roles thành công!', 'Thành công');
        return redirect()->back();
    }
}
