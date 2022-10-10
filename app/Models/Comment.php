<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'student_name','note','date','teacher_id'
    ];
    protected $primaryKey = 'id';
    protected $table = 'comments';
}
