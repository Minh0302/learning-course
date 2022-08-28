<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherCourse extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'teacher_id','course_id'
    ];
    protected $primaryKey = 'id';
    protected $table = 'teacher_course';
}
