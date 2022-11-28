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
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function all_teacher(){
        $teachers = DB::table('admin')
        ->select('admin.id','admin.admin_name','teacher_course.course_id','overview_course.overview_img','profile_teacher.teacher_img')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->join('overview_course','overview_course.teacher_id','=','admin.id')
        ->join('profile_teacher','profile_teacher.teacher_id','=','admin.id')
        ->whereNotIn('admin.id',['1'])->paginate(8);
        return view('pages.teacher.all_teacher')->with(compact('teachers'));
    }
    public function detail_teacher($id){
        $detail_teacher = DB::table('admin')
        ->select('admin.id','admin.admin_name','teacher_course.course_id','overview_course.overview_img','profile_teacher.teacher_img','profile_teacher.about','profile_teacher.achievements','profile_teacher.objectives')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->join('overview_course','overview_course.teacher_id','=','admin.id')
        ->join('profile_teacher','profile_teacher.teacher_id','=','admin.id')
        ->where('admin.id',$id)->first();
        $comments = DB::table('admin')
        ->select('admin.id','admin.admin_name','comments.student_name','comments.date','comments.note')
        ->join('comments','comments.teacher_id','=','admin.id')
        ->where('admin.id',$id)->orderBy('comments.id','DESC')->get();
        return view('pages.teacher.details_teacher')->with(compact('detail_teacher','comments'));
    }
}
