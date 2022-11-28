<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherCourse;
use Illuminate\Support\Facades\DB;
use App\Models\Overview;
use App\Models\Comment;
use App\Models\Lecture;
use App\Models\Courses;
use App\Models\Question;
use App\Models\HistoryExam;
use App\Models\Document;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    public function index(){
        // $courses = TeacherCourse::with('admin')->whereNotIn("teacher_id", ['1'])->orderBy('id','DESC')->get();
        $courses = DB::table('admin')
        ->select('admin.id','admin.admin_name','teacher_course.course_id','overview_course.overview_img','profile_teacher.teacher_img')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->join('overview_course','overview_course.teacher_id','=','admin.id')
        ->join('profile_teacher','profile_teacher.teacher_id','=','admin.id')
        ->whereNotIn('admin.id',['1'])->get();
        // $comment_teacher = DB::table('admin')
        // ->select(array('admin.id',DB::raw('COUNT(comments.teacher_id) as comments')))
        // ->join('comments','comments.teacher_id','=','admin.id')
        // ->groupBy('admin.id')
        // ->whereNotIn('admin.id',['1'])->get();
        $teachers = DB::table('admin')
        ->select('admin.id','admin.admin_name','teacher_course.course_id','overview_course.overview_img','profile_teacher.teacher_img','profile_teacher.about','profile_teacher.achievements','profile_teacher.objectives')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->join('overview_course','overview_course.teacher_id','=','admin.id')
        ->join('profile_teacher','profile_teacher.teacher_id','=','admin.id')
        ->whereNotIn('admin.id',['1'])->orderBy('admin.id', 'ASC')->limit(3)->get();
        $all_blogs = DB::table('admin')
        ->select('admin.admin_name','blog.id','blog.blog_title','blog.blog_img','blog.blog_date','blog.blog_desc','teacher_course.course_id')
        ->join('blog','blog.teacher_id','=','admin.id')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->orderBy('blog.id', 'ASC')
        ->limit(1)
        ->get();
        $list_blogs = DB::table('admin')
        ->select('admin.admin_name','blog.id','blog.blog_title','blog.blog_img','blog.blog_date','blog.blog_desc','teacher_course.course_id')
        ->join('blog','blog.teacher_id','=','admin.id')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->orderBy('blog.id', 'DESC')
        ->limit(3)
        ->get();
        $all_teachers = DB::table('admin')
        ->select('admin.id','admin.admin_name','teacher_course.course_id','overview_course.overview_img','profile_teacher.teacher_img','profile_teacher.about','profile_teacher.achievements','profile_teacher.objectives')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->join('overview_course','overview_course.teacher_id','=','admin.id')
        ->join('profile_teacher','profile_teacher.teacher_id','=','admin.id')
        ->whereNotIn('admin.id',['1'])->orderBy('admin.id', 'ASC')->limit(4)->get();
        return view('pages.home')->with(compact('courses','teachers','all_blogs','list_blogs','all_teachers'));
    }
    public function detail_course($slug, $id){
        $details = DB::table('admin')
        ->select('admin.id','admin.admin_name','teacher_course.course_id','overview_course.overview_img','profile_teacher.teacher_img','profile_teacher.about')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->join('overview_course','overview_course.teacher_id','=','admin.id')
        ->join('profile_teacher','profile_teacher.teacher_id','=','admin.id')
        ->where('admin.id',$id)->get();
        $name_course = DB::table('admin')
        ->select('admin.id','admin.admin_name','teacher_course.course_id','overview_course.overview_img','profile_teacher.teacher_img','profile_teacher.about')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->join('overview_course','overview_course.teacher_id','=','admin.id')
        ->join('profile_teacher','profile_teacher.teacher_id','=','admin.id')
        ->where('admin.id',$id)->first();
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
        ->select('admin.id','admin.admin_name','teacher_course.course_id','overview_course.overview_img','profile_teacher.teacher_img')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->join('overview_course','overview_course.teacher_id','=','admin.id')
        ->join('courses','courses.course_name','=','teacher_course.course_id')
        ->join('profile_teacher','profile_teacher.teacher_id','=','admin.id')
        ->where('teacher_course.course_id',$courses->course_name)
        ->whereNotin('teacher_course.id',[$courses->id_related])
        ->get();
        $course_like = DB::table('admin')
        ->select('admin.id','admin.admin_name','teacher_course.course_id','overview_course.overview_img','profile_teacher.teacher_img')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->join('overview_course','overview_course.teacher_id','=','admin.id')
        ->join('profile_teacher','profile_teacher.teacher_id','=','admin.id')
        ->whereNotIn('admin.id',['1'])->limit(3)->get();
        $count_comment = Comment::where('teacher_id',$id)->count();

        return view('pages.course.details_course')->with(compact('details','overviews','lectures','question_count','lecture_count','comments','course_related','name_course','count_comment','course_like'));
    }
    public function all_course(){
        $all_course = DB::table('admin')
        ->select('admin.id','admin.admin_name','teacher_course.course_id','overview_course.overview_img','profile_teacher.teacher_img')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->join('overview_course','overview_course.teacher_id','=','admin.id')
        ->join('profile_teacher','profile_teacher.teacher_id','=','admin.id')
        ->whereNotIn('admin.id',['1'])->paginate(6);
        return view('pages.course.all_course')->with(compact('all_course'));
    }
    public function all_blog(){
        $all_blogs = DB::table('admin')
        ->select('admin.admin_name','blog.id','blog.blog_title','blog.blog_img','blog.blog_date','blog.blog_desc','teacher_course.course_id')
        ->join('blog','blog.teacher_id','=','admin.id')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->orderBy('blog.id', 'ASC')
        ->paginate(2);
        // ->limit(2)
        // ->get();
        $popular_blogs = DB::table('admin')
        ->select('admin.admin_name','blog.id','blog.blog_title','blog.blog_img','blog.blog_date','blog.blog_desc','teacher_course.course_id')
        ->join('blog','blog.teacher_id','=','admin.id')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->orderBy('blog.id', 'DESC')
        ->limit(3)
        ->get();
        return view('pages.blog.all_blog')->with(compact('all_blogs','popular_blogs'));
    }
    public function detail_blog($id){
        $details_blogs = DB::table('admin')
        ->select('admin.admin_name','blog.id','blog.blog_title','blog.blog_img','blog.blog_date','blog.blog_desc','teacher_course.course_id')
        ->join('blog','blog.teacher_id','=','admin.id')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->where('blog.id',$id)
        ->first();
        $popular_blogs = DB::table('admin')
        ->select('admin.admin_name','blog.id','blog.blog_title','blog.blog_img','blog.blog_date','blog.blog_desc','teacher_course.course_id')
        ->join('blog','blog.teacher_id','=','admin.id')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->orderBy('blog.id', 'DESC')
        ->limit(3)
        ->get();
        return view('pages.blog.details_blog')->with(compact('details_blogs','popular_blogs'));
    }
    public function show_exam($slug,$id){
        // $lectures = Lecture::where('teacher_id',$id)->get();
        $lectures = DB::table('admin')
        ->select('admin.id','admin.admin_name','teacher_course.course_id','lecture_course.lecture_name','lecture_course.id as lecture_id')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->join('lecture_course','lecture_course.teacher_id','=','admin.id')
        ->where('admin.id',$id)
        ->get();
        $lectures_first = Lecture::where('teacher_id',$id)->orderBy('id','ASC')->limit(1)->first();
        if(isset($lectures_first->id)){
            $questions = Question::where('lecture_id',$lectures_first->id)->get();
            $documents = Document::where('lecture_id',$lectures_first->id)->get();
            return view('pages.lecture.exam')->with(compact('lectures','questions','documents'));
        }
        return view('pages.lecture.exam')->with(compact('lectures'));
    }
    public function show_lecture($slug,$id,$lecture_id){
        // $documents = DB::table('admin')
        // ->select('admin.id','admin.admin_name','teacher_course.course_id','lecture_course.lecture_name','lecture_course.id as lecture_id')
        // ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        // ->join('lecture_course','lecture_course.teacher_id','=','admin.id')
        // ->join('document_course','document_course.lecture_id','=','admin.id')
        // ->where('document_course.lecture_id',$lecture_id)
        // ->get();
        $documents = Document::where('lecture_id',$lecture_id)->get();
        $lectures = DB::table('admin')
        ->select('admin.id','admin.admin_name','teacher_course.course_id','lecture_course.lecture_name','lecture_course.id as lecture_id')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->join('lecture_course','lecture_course.teacher_id','=','admin.id')
        ->where('admin.id',$id)
        ->get();
        $questions = Question::where('lecture_id',$lecture_id)->get();
        return view('pages.lecture.exam')->with(compact('lectures','questions','documents'));
    }
    public function exam_question(Request $request){
        $question_id = $request->question_id;
        // $request->question_ans = array(2,2);
        $array_answer = array();
        foreach($question_id as $id){
            $arr_ques = $_POST['question_ans_'.$id.''];
            array_push($array_answer,$arr_ques);
        }
        $check_correct = array_diff_assoc($request->answer, $array_answer);
        // print_r($request->answer);die;
        if(count($check_correct) == 0){
            $correct = count($request->answer);
        }else{
            $correct = count($request->answer) - count($check_correct);
        }
        $question = Question::where('id',$id)->first();
        $lecture_id = $question->lecture_id;
        $history_exam = new HistoryExam();
        $history_exam->student_id = Session::get('id');
        $history_exam->lecture_id = $lecture_id;
        $history_exam->correct_number = $correct;
        $history_exam->student_answer = implode(',', $array_answer);
        $history_exam->save();
        Session::put('correct', $correct);
        $all_questions = Question::where('lecture_id',$request->lecture_id)->count();
        return view('pages.lecture.result')->with(compact('all_questions'));
    }
    public function search_course(Request $request){
        $tukhoa = $_GET['tukhoa'];
        $all_course = DB::table('admin')
        ->select('admin.id','admin.admin_name','teacher_course.course_id','overview_course.overview_img','profile_teacher.teacher_img')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->join('overview_course','overview_course.teacher_id','=','admin.id')
        ->join('profile_teacher','profile_teacher.teacher_id','=','admin.id')
        ->where('teacher_course.course_id','LIKE','%'.$tukhoa.'%')
        ->orWhere('admin.admin_name','LIKE','%'.$tukhoa.'%')
        ->whereNotIn('admin.id',['1'])->paginate(6);
        return view('pages.search.show_search')->with(compact('all_course','tukhoa'));
    }
    public function about_us(){
        $all_teachers = DB::table('admin')
        ->select('admin.id','admin.admin_name','teacher_course.course_id','overview_course.overview_img','profile_teacher.teacher_img','profile_teacher.about','profile_teacher.achievements','profile_teacher.objectives')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->join('overview_course','overview_course.teacher_id','=','admin.id')
        ->join('profile_teacher','profile_teacher.teacher_id','=','admin.id')
        ->whereNotIn('admin.id',['1'])->orderBy('admin.id', 'ASC')->get();
        $teachers = DB::table('admin')
        ->select('admin.id','admin.admin_name','teacher_course.course_id','overview_course.overview_img','profile_teacher.teacher_img','profile_teacher.about','profile_teacher.achievements','profile_teacher.objectives')
        ->join('teacher_course','teacher_course.teacher_id','=','admin.id')
        ->join('overview_course','overview_course.teacher_id','=','admin.id')
        ->join('profile_teacher','profile_teacher.teacher_id','=','admin.id')
        ->whereNotIn('admin.id',['1'])->orderBy('admin.id', 'ASC')->limit(3)->get();
        return view('pages.about.show_about')->with(compact('all_teachers','teachers'));
    }
}
