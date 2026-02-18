<?php

use App\Http\Controllers\mainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
// <?php

// use App\Http\Controllers\mainController;
// use App\Http\Controllers\SpecializationController;
// use Illuminate\Support\Facades\Route;

// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider and all of them will
// | be assigned to the "web" middleware group. Make something great!
// |
// */
Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

    Route::get('/', [mainController::class, 'index'])->name('index');
    Route::get('/hostpials', [mainController::class, 'hostpial'])->name('hostpial');
    Route::get('/hostpial_details/{hostpial}', [mainController::class, 'hostpial_details'])->name('hostpial_details');
    Route::get('/doctors', [mainController::class, 'doctors'])->name('doctors');
    Route::get('/offers', [mainController::class, 'offers'])->name('offers');
    Route::get('/service-details', [mainController::class, 'service_details'])->name('service-details');
    Route::get('/doctors_details/{doctor}', [mainController::class, 'doctor_details'])->name('doctor_details');
    Route::get('/blog/{id}', [mainController::class, 'show'])->name('blog.details');
    // Route::get('/offers_details/{offer}', [mainController::class, 'offer_details'])->name('offer_details');
    Route::get('/specializations', [mainController::class, 'specializations'])->name('specializations');
    Route::get('/specialization_details/{specialization}', [mainController::class, 'specialization_details'])->name('specialization_details');
    Route::get('/register', [mainController::class, 'register'])->name('register');
    Route::post('/register', [mainController::class, 'register_add'])->name('register_add');
    // Route::get('/login', [mainController::class, 'login'])->name('login');
    // Route::post('/login', [mainController::class, 'login_add'])->name('login_add');
    Route::get('/forgetpassword', [mainController::class, 'forgetpassword'])->name('forgetpassword');
    Route::post('/forgetpassword', [mainController::class, 'forgetpassword_add'])->name('forgetpassword_add');
    Route::get('/token', [mainController::class, 'token'])->name('token');
    Route::post('/token_add', [mainController::class, 'token_add'])->name('token_add');
    Route::post('/reset_password', [mainController::class, 'reset_password'])->name('reset_password');
    Route::get('/profile', [mainController::class, 'profile'])->name('profile');

    Route::get('/pay/{offer}', [mainController::class, 'pay'])->middleware('notify.offer')->name('pay');
    Route::get('/offers/{offer}', [mainController::class, 'status'])->name('offers.status');
});


// Route::get('/index', function(){
//     return view('back_end.index');
// });
