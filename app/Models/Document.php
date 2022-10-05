<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'lecture_id','document_text','document_video','document_image'
    ];
    protected $primaryKey = 'id';
    protected $table = 'document_course';
}
