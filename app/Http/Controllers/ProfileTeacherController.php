<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileTeacher;
use App\Models\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Session;
use Auth;
use Illuminate\Support\Facades\DB;

class ProfileTeacherController extends Controller
{
    public function show_profile(){
        // $profile = Admin::where('id',Auth::user()->id)->first();
        $profile = DB::table('admin')
        ->select('admin.id','admin.admin_name','admin.admin_phone','admin.admin_email','profile_teacher.teacher_img','profile_teacher.about','profile_teacher.achievements','profile_teacher.objectives')
        ->join('profile_teacher','profile_teacher.teacher_id','=','admin.id')
        ->where('admin.id',Auth::user()->id)->first();

        $count = ProfileTeacher::where('teacher_id',Auth::user()->id)->get()->count();
        if($count == 0){
            $profile_teacher = new ProfileTeacher();
            $profile_teacher->teacher_id = Auth::user()->id;
            // $profile_teacher->teacher_img = '';
            // $profile_teacher->about = '';
            // $profile_teacher->achievements = '';
            // $profile_teacher->objectives = '';
            $profile_teacher->save();
        }
        return view('admin.profile.index')->with(compact('profile'));
    }
    public function update_profile(Request $request){
        $data = $request->all();
        $profile_teacher = ProfileTeacher::find(Auth::user()->id);

        $profile_teacher->teacher_id = Auth::user()->id;
        $profile_teacher->about = $data['about'];
        $profile_teacher->achievements = $data['achievements'];
        $profile_teacher->objectives = $data['objectives'];

        $get_image = $request->file('teacher_img');
        if(isset($get_image)){
            $path = 'uploads/';
            $get_image_name = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_image_name));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image -> move($path,$new_image);

            $profile_teacher->teacher_img = $new_image;    
        } 
        $profile_teacher->save();
        Toastr::success('Cập nhật profile thành công!', 'Thành công');
        return redirect()->back();
    }
}
