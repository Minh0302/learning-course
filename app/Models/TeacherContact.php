<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherContact extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'teacher_name','teacher_email','teacher_subject','teacher_desc'
    ];
    protected $primaryKey = 'id';
    protected $table = 'teacher_contact';
}
