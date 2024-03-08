<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
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


// Route::middleware('')->group(function () {
    Route::get('/admin', [AdminController::class, 'show']);
    Route::get('/admin-create', [AdminController::class, 'create']); // Menampilkan form tambah data admin
    Route::post('/admin-create-data', [AdminController::class, 'store']); 
    // Route::get('admin/{id}/edit', [AdminController::class, 'edit']);
    Route::get('admin/{id}/edit', [AdminController::class, 'update']);
    Route::delete('admin/{id}/hapus', [AdminController::class, 'hapus'])->name('admin.hapus');

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
