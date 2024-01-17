<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\GuruController;

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

// login
Route::get('login', [LoginController::class, 'index'])->name('login.index');

// register
Route::get('register', [RegisterController::class, 'index'])->name('register.index');

// guru
Route::get('guru', [GuruController::class, 'index'])->name('guru.dashboard');