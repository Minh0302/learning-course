<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryExam extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'student_id','lecture_id','correct_number','student_answer'
    ];
    protected $primaryKey = 'id';
    protected $table = 'history_exam';
}
