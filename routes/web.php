<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeadmasterController;

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
//     return view('headmasters');
// });
// Route::get('/', function () {
//     return view('edit');
// });


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
