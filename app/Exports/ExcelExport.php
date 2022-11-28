<?php

namespace App\Exports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\FromCollection;
use Auth;
use DB;

class ExcelExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $questions = DB::table('question_course')
        ->select('question_course.id','lecture_course.lecture_name', 'question_course.question_name','question_course.option_1','question_course.option_2','question_course.option_3','question_course.option_4','question_course.answer','question_course.question_desc')
        ->leftjoin('lecture_course','lecture_course.id','=','question_course.lecture_id')
        ->where('lecture_course.teacher_id',Auth::user()->id)->get();
        return $questions;
    }
}
