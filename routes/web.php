<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/')
    ->name('client.home');
Route::middleware('checkadmin')->prefix('admin')->group(function () {
    Route::get('index', [UserController::class, 'index'])
        ->name('admin.index');
    Route::prefix('user')->group(function () {
        Route::get('list', [UserController::class, 'index'])
            ->name('admin.user.list');
        Route::get('create', [UserController::class, 'create'])
            ->name('admin.user.create');
        Route::post('store', [UserController::class, 'store'])
            ->name('admin.user.store');
    });
});

Route::prefix(('user'))->group(function () {
    Route::get('login_form', [UserController::class, 'login_form'])
        ->name('user.login_form');
    Route::post('login', [UserController::class, 'login'])
        ->name('user.login');
    Route::get('register', [UserController::class, 'register'])
        ->name('user.register');
    Route::post('store', [UserController::class, 'store'])
        ->name('user.store');
    Route::get('logout', [UserController::class, 'logout'])
        ->name('user.logout');
});

Route::prefix(('client'))->group(function () {
    Route::get('/')
        ->name('client.home');
});

// Route::get('send_mail/{id}', [SendMailController::class, 'send_mail']);