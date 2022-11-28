<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileTeacher extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'teacher_img','about','achievements','objectives'
    ];
    protected $primaryKey = 'teacher_id';
    protected $table = 'profile_teacher';
}
