<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;

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
Route::get('/home',[HomeController::class,'index']);
Route::get('/login',[LoginController::class,'login_index']);
Route::get('/register',[LoginController::class,'register_index']);
Route::post('/handle-register',[LoginController::class,'handle_register']);
Route::post('/handle-login',[LoginController::class,'handle_login']);
Route::get('/logout',[LoginController::class,'handle_logout']);
Route::get('/khoa-hoc',[HomeController::class,'all_course']);
Route::get('/khoa-hoc/{slug}/{id}',[HomeController::class,'detail_course']);
Route::post('/comment-teacher',[CommentController::class,'comment_teacher']);



Route::get('/admin',[AdminController::class,'index']);
Route::get('/admin/register',[AdminController::class,'register']);
Route::post('/admin-register',[AdminController::class,'admin_register']);
Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
Route::post('/admin-dashboard',[AdminController::class,'admin_dashboard']);
Route::get('/admin-logout',[AdminController::class,'admin_logout']);
Route::post('/admin/teacher-assign',[AdminController::class,'teacher_assign']);

// Authentication role
Route::get('/admin/teacher/assign',[AdminController::class,'assign']);
Route::get('/admin/teacher/show',[AdminController::class,'show']);
Route::post('/assign-roles',[AdminController::class,'assign_roles']);
Route::get('/admin/teacher/list',[AdminController::class,'list']);



Route::resource('/admin/courses',CourseController::class);
Route::resource('/admin/overview',OverviewController::class);
Route::resource('/admin/lecture',LectureController::class);
Route::resource('/admin/question',QuestionController::class);
Route::resource('/admin/document',DocumentController::class);
// Route::resource('/admin/teacher',TeacherController::class);
