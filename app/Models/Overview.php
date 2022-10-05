<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overview extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'summary','requirement','teacher_id'
    ];
    protected $primaryKey = 'id';
    protected $table = 'overview_course';
}
