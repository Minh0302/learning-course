<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherCourse;
use Illuminate\Support\Facades\DB;
use App\Models\Overview;
use App\Models\Comment;
use App\Models\Lecture;
use App\Models\Courses;


class HomeController extends Controller
{
    public function index(){
        // $courses = TeacherCourse::with('admin')->whereNotIn("teacher_id", ['1'])->orderBy('id','DESC')->get();
        $courses = DB::table('admin')
        ->select('admin.id','admin.admin_name','teacher_course.course_id','overview_course.overview_img')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->join('overview_course','overview_course.teacher_id','=','admin.id')
        ->whereNotIn('admin.id',['1'])->get();
        return view('pages.home')->with(compact('courses'));
    }
    public function detail_course($slug, $id){
        $details = DB::table('admin')
        ->select('admin.id','admin.admin_name','teacher_course.course_id','overview_course.overview_img')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->join('overview_course','overview_course.teacher_id','=','admin.id')
        ->where('admin.id',$id)->get();
        $overviews = Overview::where('teacher_id', $id)->get();
        $lectures = Lecture::where('teacher_id', $id)->orderBy('id','ASC')->get();
        $question_count = DB::table('lecture_course')
        ->select(DB::raw('COUNT(question_course.id) as question'))
        ->join('question_course','question_course.lecture_id','=','lecture_course.id')
        ->where('lecture_course.teacher_id',$id)->first();
        $lecture_count = DB::table('lecture_course')
        ->select(DB::raw('COUNT(lecture_course.id) as lecture'))
        ->where('lecture_course.teacher_id',$id)->first();
        $comments = DB::table('admin')
        ->select('admin.id','admin.admin_name','comments.student_name','comments.date','comments.note')
        ->join('comments','comments.teacher_id','=','admin.id')
        ->where('admin.id',$id)->orderBy('comments.id','DESC')->get();

        $courses = DB::table('admin')
        ->select('admin.id','admin.admin_name','teacher_course.course_id','overview_course.overview_img','courses.course_name','teacher_course.id as id_related')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->join('overview_course','overview_course.teacher_id','=','admin.id')
        ->join('courses','courses.course_name','=','teacher_course.course_id')
        ->where('courses.course_slug',$slug)
        ->where('admin.id',$id)->first();
        // $course_related = Product::with('category','brand')->where('product_status','0')->where('category_id',$product->category->id)->whereNotin('id',[$product->id])->get();
        $course_related = DB::table('admin')
        ->select('admin.id','admin.admin_name','teacher_course.course_id','overview_course.overview_img')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->join('overview_course','overview_course.teacher_id','=','admin.id')
        ->join('courses','courses.course_name','=','teacher_course.course_id')
        ->where('teacher_course.course_id',$courses->course_name)
        ->whereNotin('teacher_course.id',[$courses->id_related])
        ->get();

        return view('pages.course.details_course')->with(compact('details','overviews','lectures','question_count','lecture_count','comments','course_related'));
    }
    public function all_course(){
        $all_course = DB::table('admin')
        ->select('admin.id','admin.admin_name','teacher_course.course_id','overview_course.overview_img')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->join('overview_course','overview_course.teacher_id','=','admin.id')
        ->whereNotIn('admin.id',['1'])->get();
        return view('pages.course.all_course')->with(compact('all_course'));
    }
}
