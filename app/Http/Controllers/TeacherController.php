<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Roles;
use App\Models\Courses;
use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;
use Brian2694\Toastr\Facades\Toastr;

class TeacherController extends Controller
{
    public function show(){
        $admin = Admin::with('roles')->orderBy('id','DESC')->get();
        return view('admin.teacher.index')->with(compact('admin'));
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
