<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'lecture_name','lecture_desc','teacher_id'
    ];
    protected $primaryKey = 'id';
    protected $table = 'lecture_course';
    public function question(){
        return $this->hasMany('App\Models\Question');
    }
}
