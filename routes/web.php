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
