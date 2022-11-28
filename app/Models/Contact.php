<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'student_name','student_email','contact_subject','contact_phone','contact_note'
    ];
    protected $primaryKey = 'id';
    protected $table = 'contact';
}
