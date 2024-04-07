<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GenerationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DetailPresencesController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeadmasterController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\RoomController;



//Headmaster
Route::group(['namespace' => 'headmaster'], function () {
    Route::get('/headmaster', [HeadmasterController::class, 'index']);
    Route::get('/headmaster-create', [HeadmasterController::class, 'setting']);
    Route::post('headmaster/create', [HeadmasterController::class, 'store']);
    Route::post('headmaster/edit', [HeadmasterController::class, 'update']);
    Route::post('headmaster/edit/password', [HeadmasterController::class, 'passwordUpdate']);
});

//Teacher
Route::group(['namespace' => 'teacher'], function () {
    Route::get('/teacher', [TeacherController::class, 'index']);
    Route::post('/teacher-create-data', [TeacherController::class, 'store']);
    Route::post('teacher/{id}/edit', [TeacherController::class, 'update']);
    Route::delete('/teacher/{id}/hapus', [TeacherController::class, 'hapus'])->name('teacher.hapus');
});


//Rooms
Route::group(['namespace' => 'room'], function () {
    Route::get('/room', [RoomController::class, 'index']);
    Route::post('/room', [RoomController::class, 'store']);
    Route::post('/room-create-data', [RoomController::class, 'store']);
    Route::post('room/{id}/edit', [RoomController::class, 'update']);
    Route::delete('/room/{id}/hapus', [RoomController::class, 'hapus'])->name('room.hapus');
});

//Admin
Route::group(['namespace' => 'admin'], function () {
    Route::get('/admin', [AdminController::class, 'show']);
    Route::post('/admin-create-data', [AdminController::class, 'store']);
    Route::get('admin/{id}/edit', [AdminController::class, 'update']);
    Route::delete('admin/{id}/hapus', [AdminController::class, 'hapus'])->name('admin.hapus');
});

//Generations
Route::group(['namespace' => 'generation'], function () {
    Route::get('/generation', [GenerationController::class, 'show']);
    Route::post('/generation-create-data', [GenerationController::class, 'store']);
    Route::get('generation/{id}/edit', [GenerationController::class, 'update']);
    Route::delete('generation/{id}', [GenerationController::class, 'hapus'])->name('generation.hapus');
});


//Schedule
Route::group(['namespace' => 'schedule'],function () {

});

//Presence
Route::group(['namespace' => 'presence'], function () {
    
});

//Details Presence
Route::group(['namespace' => 'details_presence'], function () {
    
});

//Login
Route::group(['namespace' => 'login'], function () {
    Route::get('/', [UserController::class, 'index_login'])->name('login');
    Route::post('/log', [UserController::class, 'login'])->name('login.store');
    Route::get('/forgot-password', [UserController::class, 'forgot_password'])->name('forgot-password');
    Route::post('/forgot-password-act', [UserController::class, 'forgot_password_act'])->name('forgot-password-act');
    Route::get('/reset-password', [UserController::class, 'showResetForm']);
    Route::post('/reset-password-act', [UserController::class, 'showResetForm_act']);
    Route::get('/register', [UserController::class, 'index_register'])->name('register');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');
});

//Courses
Route::group(['namespace' => 'courses'], function () {
    Route::get('/courses', [CourseController::class, 'index_course']);
    Route::post('/courses_create', [CourseController::class, 'store']);
    Route::post('courses/{id}/edit', [CourseController::class, 'update']);
    Route::delete('courses/{id}/delete', [CourseController::class, 'delete'])->name('delete.course');
});

Route::group(['namespace' => 'presences'], function () {
    Route::get('/presences', [PresenceController::class, 'index']);
    Route::get('/presences/add-presence-data', [PresenceController::class, 'getSchedule']);
    Route::post('/presences/add-presence-data/{id}', [PresenceController::class, 'store']);
});

