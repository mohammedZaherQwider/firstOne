<?php

use App\Http\Controllers\mainController;
use App\Http\Controllers\SpecializationController;
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

Route::get('/', [mainController::class,'index'])->name('index');
Route::get('/hostpial', [mainController::class,'hostpial'])->name('hostpial');
Route::get('/hostpial_details/{hostpial}', [mainController::class,'hostpial_details'])->name('hostpial_details');
Route::get('/register', [mainController::class,'register'])->name('register');
Route::post('/register', [mainController::class,'register_add'])->name('register_add');
Route::get('/login', [mainController::class,'login'])->name('login');
Route::post('/login', [mainController::class,'login_add'])->name('login_add');
Route::get('/forgetpassword', [mainController::class,'forgetpassword'])->name('forgetpassword');
Route::post('/forgetpassword', [mainController::class,'forgetpassword_add'])->name('forgetpassword_add');
Route::post('/token', [mainController::class,'token'])->name('token');
Route::post('/reset_password', [mainController::class,'reset_password'])->name('reset_password');
Route::get('/profile', [mainController::class,'profile'])->name('profile');

