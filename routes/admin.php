<?php

use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\UploadController;
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

Route::get('/admin', function () {
    return 'admin';
});

Route::resource('/doctors', DoctorController::class);
Route::get('/doctors-pdf', [DoctorController::class, 'pdf'])->name('pdf');
Route::post('/upload', [UploadController::class, 'upload'])->name('upload');
