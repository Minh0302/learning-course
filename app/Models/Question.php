<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'lecture_id','question_name','option_1','option_2','option_3','option_4','answer','question_desc'
    ];
    protected $primaryKey = 'id';
    protected $table = 'question_course';
    public function lecture(){
        return $this->belongsTo('App\Models\Lecture','lecture_id','id');
    }
}
