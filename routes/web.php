<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index']);
Route::get('/admin',[AdminController::class,'index']);
Route::get('/admin/register',[AdminController::class,'register']);
Route::post('/admin-register',[AdminController::class,'admin_register']);
Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
Route::post('/admin-dashboard',[AdminController::class,'admin_dashboard']);
Route::get('/admin-logout',[AdminController::class,'admin_logout']);
Route::post('/admin/teacher-assign',[AdminController::class,'teacher_assign']);

// Authentication role


Route::get('/admin/teacher/assign',[TeacherController::class,'assign']);
Route::get('/admin/teacher/show',[TeacherController::class,'show']);
Route::post('/assign-roles',[TeacherController::class,'assign_roles']);


Route::resource('/admin/courses',CourseController::class);
// Route::resource('/admin/teacher',TeacherController::class);
