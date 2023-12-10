<?php

use App\Http\Controllers\BorrowsController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\ListBooksController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RepaymentsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
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
Route::delete('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'status: Pustakawan']], function(){
    Route::resource('peminjaman', BorrowsController::class);
    Route::resource('pengembalian', HistoryController::class);
    Route::get('/pustakawan', [LibrarianController::class, 'index'])->name('pustakawan');
    Route::resource('daftar-buku', ListBooksController::class);
    Route::get('/pustakawan/pemustaka', [LibrarianController::class, 'pemustaka'])->name('pemustaka');
    Route::resource('students', StudentsController::class);
});
Route::resource('teachers', TeachersController::class);

Route::resource('books', ListBooksController::class);
Route::get('/pemustaka', [UsersController::class, 'index'])->name('beranda');
Route::get('/pemustaka', [UsersController::class, 'displaybook'])->name('daftar.buku');