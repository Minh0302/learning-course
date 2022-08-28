<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherCourse;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Roles;
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
    // public function admin_dashboard(Request $request){
    //     $data = $request->all();
    //     $admin_email = $data['admin_email'];
    //     $admin_password  = md5($request->admin_password);
    //     $login = Admin::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();

    //     if($login){
    //         $login_count = $login->count();
    //          if($login_count>0){
    //             Session::put('admin_name',$login->admin_name);
    //             Session::put('admin_id',$login->admin_id);
    //             return Redirect::to('/admin/dashboard');
    //             }
    //         }
    //         else{
    //                  Session::put('message','Email or Password Incorrect');
    //                  return Redirect::to('/admin');
    //     }
    // }
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
    // public function admin_logout(){
    //     // $this->AuthLogin();
    //     Session::put('admin_name',null);
    //     Session::put('admin_id',null);
    //     return Redirect::to('/admin');
    // }
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
}
