<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\HospitalController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\OperationController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Spatie\Permission\Contracts\Role;

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

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

    Route::resource('/doctors', DoctorController::class);
    Route::get('/doctors-pdf', [DoctorController::class, 'pdf'])->name('pdf');
    Route::post('/upload', [UploadController::class, 'upload'])->name('upload');
    Route::post('/delete-old-image', [UploadController::class, 'deleteOldImage'])->name('deleteOldImage');

    Route::resource('/hospitals', HospitalController::class);
    Route::post('/hospital/upload-image', [HospitalController::class, 'uploadImage'])
        ->name('uploadImage');

    Route::get('/cities/{country_id}', [HospitalController::class, 'getCities'])->name('getCities');

    Route::resource('/operations', OperationController::class);

    Route::resource('/roles', RoleController::class);
    Route::resource('/users', UserController::class);

    Route::get('/send-Notifications', [AdminController::class, 'notification'])->name('notification');
    Route::post('/send-Notifications', [AdminController::class, 'send_notification'])->name('send_notification');
    Route::get('/read-notification/{id}', [AdminController::class, 'read'])->name('read');
});
