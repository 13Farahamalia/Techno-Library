<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentsController;
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

Route::resource('students', StudentsController::class);
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/', [LoginController::class, 'loginPost'])->name('login');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginPost'])->name('login');


// Route::get('/students', [LoginController::class, 'index'])->name('students');
// Route::get('/students/add', [LoginController::class, 'add'])->name('student.add');
// Route::post('/students/add', [LoginController::class, 'store'])->name('student.store');
// Route::post('/students/add', [LoginController::class, 'store'])->name('student.store');
// Route::get('students/{id}/edit', [LoginController::class, 'edit'])->name('student.edit');
// Route::put('students/{id}', [LoginController::class, 'update'])->name('student.update');
// Route::delete('students/{id}', [LoginController::class, 'destroy'])->name('student.destroy');
// Route::get('/teachers', [LoginController::class, 'teachers']);
