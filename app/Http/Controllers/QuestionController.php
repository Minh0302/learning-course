<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecture;
use App\Models\Question;
use Brian2694\Toastr\Facades\Toastr;
use Session;
use Auth;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = DB::table('question_course')
        ->select('question_course.id','lecture_course.lecture_name', 'question_course.question_name','question_course.option_1','question_course.option_2','question_course.option_3','question_course.option_4','question_course.answer','question_course.question_desc')
        ->leftjoin('lecture_course','lecture_course.id','=','question_course.lecture_id')
        ->where('lecture_course.teacher_id',Auth::user()->id)->get();
        return view('admin.question.index')->with(compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lectures = Lecture::where('teacher_id', Auth::user()->id)->get();
        return view('admin.question.create')->with(compact('lectures')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'lecture_id' => 'required',
            'question_name' => 'required',
            'option_1' => 'required',
            'option_2' => 'required',
            'option_3' => 'required',
            'option_4' => 'required',
            'answer' => 'required',
            'question_desc' => 'nullable'
        ]);
        $question = new Question();
        $question->lecture_id = $data['lecture_id'];
        $question->question_name = $data['question_name'];
        $question->option_1 = $data['option_1'];
        $question->option_2 = $data['option_2'];
        $question->option_3 = $data['option_3'];
        $question->option_4 = $data['option_4'];
        $question->answer = $data['answer'];
        $question->question_desc = $data['question_desc'];
        $question->save();
        Toastr::success('Thêm câu hỏi thành công!', 'Thành công');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questions = Question::find($id);
        $lectures = Lecture::where('teacher_id', Auth::user()->id)->get();
        return view('admin.question.index')->with(compact('question','lectures'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        $lectures = Lecture::where('teacher_id', Auth::user()->id)->get();
        return view('admin.question.edit')->with(compact('question','lectures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'lecture_id' => 'required',
            'question_name' => 'required',
            'option_1' => 'required',
            'option_2' => 'required',
            'option_3' => 'required',
            'option_4' => 'required',
            'answer' => 'required',
            'question_desc' => 'nullable'
        ]);
        $question = Question::find($id);
        $question->lecture_id = $data['lecture_id'];
        $question->question_name = $data['question_name'];
        $question->option_1 = $data['option_1'];
        $question->option_2 = $data['option_2'];
        $question->option_3 = $data['option_3'];
        $question->option_4 = $data['option_4'];
        $question->answer = $data['answer'];
        $question->question_desc = $data['question_desc'];
        $question->save();
        Toastr::success('Update câu hỏi thành công!', 'Thành công');
        return redirect()->route('question.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::find($id)->delete();
        Toastr::success('Xoá câu hỏi thành công!', 'Thành công');
        return redirect()->back();
    }
}
