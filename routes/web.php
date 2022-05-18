<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BorrowController;



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
//Route::view('/', 'try');

Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/login', [MainController::class, 'login'])->name('login');
Route::get('/register', [MainController::class, 'register'])->name('register');
Route::get('/profile', [MainController::class, 'show'])->name('profile')->middleware('auth');
Route::get('/borrows/list', [BorrowController::class, 'list'])->name('borrows.list');

Route::view('/home', 'welcome')->name('home');

Route::resource('genres', GenreController::class);
Route::resource('borrows', BorrowController::class);
Route::get('/borrows/{id}', [BorrowController::class, 'store']);
Route::resource('books', BookController::class);

// Route::resource('index', HomeController::class);
// Route::resource('books', BookController::class);


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\MainController::class, 'index'])->name('home');
