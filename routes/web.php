<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeadmasterController;
use App\Models\Teacher;
use Database\Seeders\TeachersSeeder;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Contoh Dari penulisan Route Get didalam route web
// Route::get('/teacher', [TeacherController::class, 'adding_teacher']);


Route::group(['namespace' => 'headmaster'], function () {
    Route::get('/headmaster', [HeadmasterController::class, 'index']);
    Route::get('/create', [HeadmasterController::class, 'setting']);
    Route::post('headmaster/create', [HeadmasterController::class, 'store']);
});

//Teacher
Route::prefix('teacher')->group(function () {
});

//teacher1
Route::get('/', [TeacherController::class, 'index']);
Route::post('/teacher-create-data', [TeacherController::class, 'store']);
Route::get('/teacher', [TeacherController::class, 'show']);
Route::get('/teacher-create', [TeacherController::class, 'create']); // Menampilkan form tambah data admin
Route::post('/teacher-create-data', [TeacherController::class, 'store']);
// Route::get('admin/{id}/edit', [AdminController::class, 'edit']);
Route::post('teacher/{id}/edit', [TeacherController::class, 'update']);
Route::delete('/teacher/{id}/hapus', [TeacherController::class, 'hapus'])->name('teacher.hapus');    
// 

//Course
Route::prefix('course')->group(function () {
});

//Admin
Route::prefix('admin')->group(function () {
    Route::post('/store', [AdminController::class, 'store']); // Menyimpan data admin baru  
});


//Room atau Classroom
Route::prefix('classroom')->group(function () {
});

//Schedule
Route::prefix('schedule')->group(function () {
});

//Presence
Route::prefix('presence')->group(function () {
});

//Details Presence
Route::prefix('detail-presence')->group(function () {
});

//Login
Route::get('/', [UserController::class, 'index_login'])->name('login');
Route::post('/log', [UserController::class, 'login'])->name('login.store');

Route::get('/forgot-password', [UserController::class, 'forgot_password'])->name('forgot-password');
Route::post('/forgot-password-act', [UserController::class, 'forgot_password_act'])->name('forgot-password-act');

Route::get('/reset-password', [UserController::class, 'showResetForm']);
Route::post('/reset-password-act', [UserController::class, 'showResetForm_act']);


// Route::get('/reset-password', function () {
//     return view('templates.amel.forgot-password');
// })->middleware('password.confirm')->name('password.request');

Route::get('/register', [UserController::class, 'index_register'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.store');



//admins
// Route::middleware('')->group(function () {
    Route::get('/admin', [AdminController::class, 'show']);
    Route::get('/admin-create', [AdminController::class, 'create']); // Menampilkan form tambah data admin
    Route::post('/admin-create-data', [AdminController::class, 'store']); 
    // Route::get('admin/{id}/edit', [AdminController::class, 'edit']);
    Route::get('admin/{id}/edit', [AdminController::class, 'update']);
    Route::delete('admin/{id}/hapus', [AdminController::class, 'hapus'])->name('admin.hapus');
// });

// Route::get('/', function () {
//     return view('headmasters');
// });
// Route::get('/', function () {
//     return view('edit');
// });

=======
// Route::get('/', function () {
//     return view('welcome');
// });


