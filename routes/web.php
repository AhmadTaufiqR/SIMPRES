<?php

use App\Http\Controllers\TeacherController;
use App\Models\Teacher;
use Database\Seeders\TeachersSeeder;
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


//Contoh Dari penulisan Route Get didalam route web
// Route::get('/teacher', [TeacherController::class, 'adding_teacher']);




//teacher1
Route::get('/', [TeacherController::class, 'index']);
Route::post('/teacher-create-data', [TeacherController::class, 'store']);
Route::get('/teacher', [TeacherController::class, 'show']);
Route::get('/teacher-create', [TeacherController::class, 'create']); // Menampilkan form tambah data admin
Route::post('/teacher-create-data', [TeacherController::class, 'store']);
// Route::get('admin/{id}/edit', [AdminController::class, 'edit']);
Route::post('teacher/{id}/edit', [TeacherController::class, 'update']);
Route::delete('/teacher/{id}/hapus', [TeacherController::class, 'hapus'])->name('teacher.hapus');    
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
