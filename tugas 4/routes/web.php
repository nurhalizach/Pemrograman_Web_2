<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LukisanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GalleryController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/gallery', [GalleryController::class, 'showGallery'])->name('gallery');

//ROUTE TABLE LUKISAN
Route::get('/lukisan', [LukisanController::class, 'index']);
Route::get('/data_lukisan',[LukisanController::class,'showDataLukisan'])->name('lukisan.showDataLukisan');

Route::get('/tambahLukisan', [LukisanController::class, 'buat'])->name('lukisan.buat');
Route::post('/tambahLukisan', [LukisanController::class, 'tambah'])->name('lukisan.tambah');

Route::get('/editLukisan/{id}', [LukisanController::class, 'edit'])->name('lukisan.edit');
Route::post('/editlukisan/{id}', [LukisanController::class, 'ubah'])->name('lukisan.ubah');

Route::post('/lukisan/{id}', [LukisanController::class, 'hapus'])->name('lukisan.hapus');

// ROUTE TABLE USERS
Route::get('/users', [Controller::class, 'index']);

Route::get('/tambahUser', [UserController::class, 'buat'])->name('user.buat');
Route::post('/tambahUser', [UserController::class, 'tambah'])->name('user.tambah');

Route::get('/editUser/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('/editUser/{id}', [UserController::class, 'ubah'])->name('user.ubah');

Route::post('/User/{id}', [UserController::class, 'hapus'])->name('user.hapus');

// ROUTE LOGIN DAN REGISTER
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');

Route::get('/data_user',[UserController::class,'showDataUser'])->name('user.showDataUser');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});

