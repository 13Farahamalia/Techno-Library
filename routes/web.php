<?php

use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\ListBooksController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\UsersController;
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

Route::get('/', [UsersController::class, 'index'])->name('beranda');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginPost'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'status:Pustakawan'])->group(function () {
    Route::resource('students', StudentsController::class);
    Route::get('/pustakawan', [LibrarianController::class, 'index'])->name('pustakawan');
    Route::resource('daftar-buku', ListBooksController::class);
});

Route::resource('books', ListBooksController::class);
Route::get('/pemustaka', [UsersController::class, 'index'])->name('beranda');
Route::get('/pemustaka', [UsersController::class, 'displaybook'])->name('daftar.buku');