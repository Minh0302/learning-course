<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'course_name','course_slug','course_desc','course_status'
    ];
    protected $primaryKey = 'id';
    protected $table = 'courses';
    // public function product(){
    //     return $this->hasMany('App\Models\Product');
    // }
}
