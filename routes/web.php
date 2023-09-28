<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\TimetableController;
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

Route::get('/', [AuthController::class, 'mainDash']);
Route::get('/register', [AuthController::class, 'loadRegister']);
Route::post('/regForm', [AuthController::class, 'registration']);

Route::get('/login', [AuthController::class, 'loadLogin']);
Route::post('/loginForm', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// Forget and Reset Password 
Route::get('/forgetPasswordGet', [ForgetPasswordController::class, 'showForgetPassword']);
Route::post('/forgetPasswordPost', [ForgetPasswordController::class, 'submitForgetPassword']);
Route::get('/resetPasswordGet/{token}', [ForgetPasswordController::class, 'showResetPassword']);
Route::post('/resetPasswordPost', [ForgetPasswordController::class, 'submitResetPassword']);

Route::group(['middleware'=>['web', 'checkAdmin']], function(){
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashLoad']);
    Route::get('/admin/editPfLoad/{id}', [AdminController::class, 'loadAdminPf']);
    Route::post('/admin/updatePf/{id}', [AdminController::class, 'updateAdminPf']);
    
    Route::get('/user/loadEdit/{id}', [AdminController::class, 'loadEditRole']);
    Route::post('/user/editRole/{id}', [AdminController::class, 'editUserRole']);
    Route::get('/admin/deleteUser/{id}', [AdminController::class, 'deleteUser']);

    // Grade12 
    Route::get('/admin/grade12', [AdminController::class, 'grade12Dashboard']);
    Route::get('/admin/toG12Student', [AdminController::class, 'toG12student']);

    // Grade11
    Route::get('/admin/grade11', [AdminController::class, 'grade11Dashboard']);
    Route::get('/admin/toG11Student', [AdminController::class, 'toG11student']);

    // Grade10
    Route::get('/admin/grade10', [AdminController::class, 'grade10Dashboard']);
    Route::get('/admin/toG10Student', [AdminController::class, 'toG10student']);

    // Common Exam shedule 
    Route::get('/exam/dashboard', [ExamController::class, 'showExamDashboard']);
    Route::get('/delete-old-exams', [ExamController::class, 'deleteOldExams']);

    // timetable routes 
    Route::get('/mainTimetableDash', [TimetableController::class, 'mainTimetable']);
    Route::get('/loadManageTimetable', [TimetableController::class, 'loadManageTimetable']);
    Route::post('/storeTimetable', [TimetableController::class, 'storeTimetable']);
    Route::get('/showTimetable', [TimetableController::class, 'showTimetable']);
    Route::post('/update_timetable', [TimetableController::class, 'updateTimetable']);

    // showing feedback 
    Route::get('/showingFeedback', [AdminController::class, 'showingFeedback']);

    Route::get('/delete-old-feedbacks', [AdminController::class, 'deleteOldFeedbacks']);

});

// teacher Routes

Route::group(['middleware'=>['web', 'checkTeacher']], function(){
    Route::get('/teacher/dashboard', [TeacherController::class, 'teacherDashboard']);
    Route::get('/teacher/profile', [TeacherController::class, 'teacherProfile']);
    Route::get('/teacher/editPfLoad', [TeacherController::class, 'teacherPfEdit']);
    Route::post('/teacher/updatePf', [TeacherController::class, 'teacherUpdatePf']);

    // Adding Exams 
    Route::get('/examForm', [TeacherController::class, 'examForm']);
    Route::post('/submit_exam', [TeacherController::class, 'addExam']);

    // Timetable 
    Route::get('/teacher/timetable', [TeacherController::class, 'showTimetable']);
});



// Student route 
Route::group(['middleware'=>['web', 'checkStudent']], function() {
    Route::get('student/dashboard', [StudentController::class, 'dashboard']);
    Route::get('/student/profile', [StudentController::class, 'profile']);
    Route::get('/student/editProfile', [StudentController::class, 'editprofile']);
    Route::post('/student/updateProfile', [StudentController::class, 'updateProfile']);
    Route::get('/student/timetable', [StudentController::class, 'showTimetable']);
    Route::get('/student/examDash', [StudentController::class, 'examDash']);
    Route::post('/feedback', [AuthController::class, 'sendFeedback']);
});



