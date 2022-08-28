<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'admin_email','admin_password','admin_name','admin_phone'
    ];
    protected $primaryKey = 'id';
    protected $table = 'admin';
    public function roles(){
        return $this->belongsToMany('App\Models\Roles');
    }
    public function getAuthPassword(){
        return $this->admin_password;
    }
    public function hasAnyRoles($roles){
        return null != $this->roles()->whereIn("roles_name", $roles)->first();
    }
    public function hasRole($role){
        return null != $this->roles()->where("roles_name", $role)->first();
    }
}
