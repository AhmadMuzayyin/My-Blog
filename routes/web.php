<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [HomeController::Class, 'index']);

Route::get('/member', [UserController::Class, 'index']);
Route::post('/tambahUSER', [UserController::Class, 'store'])->name('tambah.data');
Route::post('/editUser/{id}', [UserController::Class, 'update'])->name('edit.data');
Route::post('/deleteUser/{id}', [UserController::Class, 'destroy'])->name('delete.data');

Route::get('/about', [HomeController::class, 'about']);
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/post/{post:slug}', [BlogController::class, 'show']);
Route::get('/categories', [BlogController::class, 'categories']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');