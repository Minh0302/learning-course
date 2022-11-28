<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'teacher_id','blog_title','blog_img','blog_date','blog_desc'
    ];
    protected $primaryKey = 'id';
    protected $table = 'blog';
}
