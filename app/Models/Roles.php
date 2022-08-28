<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'roles_name'
    ];
    protected $primaryKey = 'id';
    protected $table = 'roles';
    public function admin(){
        return $this->belongsToMany('App\Models\Admin');
    }
}
