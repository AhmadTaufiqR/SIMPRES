<?php

use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
// Route::get('/', function () {
//     return view('welcome');
// });

//Contoh Dari penulisan Route Get didalam route web
// Route::get('/teacher', [TeacherController::class, 'adding_teacher']);

//Teacher
Route::prefix('teacher')->group(function () {
});

// //Course
Route::prefix('course')->group(function () {
});

//Admin
Route::prefix('admin')->group(function () {
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


