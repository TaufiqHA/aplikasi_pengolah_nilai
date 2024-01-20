<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RedirectController;

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

Route::middleware(['guest'])->group(function () {
	Route::get('/', [LoginController::class, 'index'])->name('login.index');
	Route::post('/login', [LoginController::class, 'login'])->name('login');
	Route::get('register', [RegisterController::class, 'index'])->name('register.index');
});

Route::middleware(['auth', 'checkrole:1,2'])->group(function () {
	Route::get('/redirect', [RedirectController::class, 'check'])->name('redirect');
	Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'checkrole:1'])->group(function () {
	Route::get('guru', [GuruController::class, 'index'])->name('guru.dashboard');
	Route::get('kelas', [KelasController::class, 'index'])->name('kelas.index');
});

Route::middleware(['auth', 'checkrole:2'])->group(function () {
	Route::get('admin', [AdminController::class, 'index'])->name('admin.dashboard');
	Route::get('admin/addUser', [AdminController::class, 'addUser'])->name('admin.addUser');
	Route::post('user/addUser', [UserController::class, 'addUser'])->name('user.addUser');
});