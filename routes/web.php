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
use App\Http\Controllers\ProfileTeacherController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;

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
// đăng nhập Google
Route::get('/login-google',[LoginController::class,'login_google']);
Route::get('/google/callback',[LoginController::class,'callback_google']);

Route::post('/handle-register',[LoginController::class,'handle_register']);
Route::post('/handle-login',[LoginController::class,'handle_login']);
Route::get('/logout',[LoginController::class,'handle_logout']);
Route::get('/khoa-hoc',[HomeController::class,'all_course']);
Route::get('/tim-kiem',[HomeController::class,'search_course']);
Route::get('/khoa-hoc/{slug}/{id}',[HomeController::class,'detail_course']);
Route::post('/comment-teacher',[CommentController::class,'comment_teacher']);
Route::get('/blog',[HomeController::class,'all_blog']);
Route::get('/ve-chung-toi',[HomeController::class,'about_us']);
Route::get('/blog-chi-tiet/{id}',[HomeController::class,'detail_blog']);
Route::get('/lien-he',[ContactController::class,'show_contact']);
Route::post('/save-contact',[ContactController::class,'save_contact']);
Route::get('/all-contact',[ContactController::class,'all_contact']);
Route::get('/all-contact-teacher',[ContactController::class,'all_contact_teacher']);
Route::get('/teacher-contact',[ContactController::class,'teacher_contact']);
Route::post('/save-teacher-contact',[ContactController::class,'save_teacher_contact']);

Route::get('/giao-vien',[TeacherController::class,'all_teacher']);
Route::get('/giao-vien/{id}',[TeacherController::class,'detail_teacher']);
Route::get('/khoa-hoc/exam/{slug}/{id}',[HomeController::class,'show_exam']);
Route::get('/khoa-hoc/exam/{slug}/{id}/lecture/{lecture_id}',[HomeController::class,'show_lecture']);
Route::post('/exam-question',[HomeController::class,'exam_question']);


Route::get('/admin',[AdminController::class,'index']);
Route::get('/admin/register',[AdminController::class,'register']);
Route::post('/admin-register',[AdminController::class,'admin_register']);
Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
Route::post('/admin-dashboard',[AdminController::class,'admin_dashboard']);
Route::get('/admin-logout',[AdminController::class,'admin_logout']);
Route::post('/admin/teacher-assign',[AdminController::class,'teacher_assign']);
Route::post('/import-csv',[AdminController::class,'import_csv']);
Route::post('/export-csv',[AdminController::class,'export_csv']);
Route::get('/admin/giao-vien/chi-tiet/{id}',[AdminController::class,'admin_detail_teacher']);

// Authentication role
Route::get('/admin/teacher/assign',[AdminController::class,'assign']);
Route::get('/admin/teacher/show',[AdminController::class,'show']);
Route::post('/assign-roles',[AdminController::class,'assign_roles']);
Route::get('/admin/teacher/list',[AdminController::class,'list']);
Route::get('/admin/teacher/profile',[ProfileTeacherController::class,'show_profile']);
Route::put('/update-profile',[ProfileTeacherController::class,'update_profile']);



Route::resource('/admin/courses',CourseController::class);
Route::resource('/admin/overview',OverviewController::class);
Route::resource('/admin/lecture',LectureController::class);
Route::resource('/admin/question',QuestionController::class);
Route::resource('/admin/document',DocumentController::class);
Route::resource('/admin/blog',BlogController::class);
// Route::resource('/admin/teacher',TeacherController::class);
