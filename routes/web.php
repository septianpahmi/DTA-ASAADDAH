<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //users
    Route::get('/users', [UsersController::class, 'index'])->name('users');
    Route::post('/users/post', [UsersController::class, 'post'])->name('users.post');
    Route::post('/users/update/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::get('/users/delete/{id}', [UsersController::class, 'delete'])->name('users.delete');
    //siswa
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
    Route::post('/siswa/post', [SiswaController::class, 'post'])->name('siswa.post');
    Route::post('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::get('/siswa/delete/{id}', [SiswaController::class, 'delete'])->name('siswa.delete');
    //payment
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
    Route::get('/payment/users', [PaymentController::class, 'indexUser'])->name('payment.user');
    Route::post('/payment/post', [PaymentController::class, 'post'])->name('payment.post');
    Route::get('/payment/delete/{id}', [PaymentController::class, 'delete'])->name('payment.delete');
    Route::get('/payment/approve/{id}', [PaymentController::class, 'approve'])->name('payment.approve');
    Route::get('/payment/invoice/{id}', [PaymentController::class, 'invoice'])->name('payment.invoice');
    Route::get('/payment/send-mail/{id}', [PaymentController::class, 'sendMail'])->name('payment.sendMail');
});
require __DIR__ . '/auth.php';
