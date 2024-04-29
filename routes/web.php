<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Payment_infoController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ServicesController;
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
        Route::get('edit/{id}', [UserController::class, 'edit'])
        ->name('admin.user.edit');
        Route::put('update/{id}', [UserController::class, 'update'])
        ->name('admin.user.update');
        Route::get('delete/{id}', [UserController::class, 'delete'])
        ->name('admin.user.delete');
    });
    //Categories
    Route::prefix('categories')->group(function () {
        Route::get('list', [CategoriesController::class,'index'])
        ->name('admin.categories.list');
        Route::get('create', [CategoriesController::class,'create'])
        ->name('admin.categories.create');
        Route::post('store', [CategoriesController::class,'store'])
        ->name('admin.categories.store');
        Route::get('edit/{id}', [CategoriesController::class, 'edit'])
        ->name('admin.categories.edit');
        Route::put('update/{id}', [CategoriesController::class, 'update'])
        ->name('admin.categories.update');
        Route::get('delete/{id}', [CategoriesController::class, 'delete'])
        ->name('admin.categories.delete');
    });
     //Photographer
     Route::prefix('photographer')->group(function () {
        Route::get('list', [PhotoController::class,'index'])
        ->name('admin.photographer.list');
        Route::get('create', [PhotoController::class,'create'])
        ->name('admin.photographer.create');
        Route::post('store', [PhotoController::class,'store'])
        ->name('admin.photographer.store');
        Route::get('edit/{id}', [PhotoController::class, 'edit'])
        ->name('admin.photographer.edit');
        Route::put('update/{id}', [PhotoController::class, 'update'])
        ->name('admin.photographer.update');
        Route::get('delete/{id}', [PhotoController::class, 'delete'])
        ->name('admin.photographer.delete');
    });
    //Service
    Route::prefix('services')->group(function () {
        Route::get('list', [ServicesController::class,'index'])
        ->name('admin.service.list');
        Route::get('create', [ServicesController::class,'create'])
        ->name('admin.service.create');
        Route::post('store', [ServicesController::class,'store'])
        ->name('admin.service.store');
        Route::get('edit/{id}', [ServicesController::class, 'edit'])
            ->name('admin.service.edit');
        Route::put('update/{id}', [ServicesController::class, 'update'])
            ->name('admin.service.update');
        Route::get('update_status', [ServicesController::class, 'update_status'])
            ->name('admin.service.update_status');
        Route::get('delete/{id}', [ServicesController::class, 'delete'])
            ->name('admin.service.delete');
    });
    // Payment_info
    Route::prefix('payment')->group(function () {
        Route::get('list', [Payment_infoController::class,'index'])
        ->name('admin.payment.list');
        Route::get('edit/{id}', [Payment_infoController::class, 'edit'])
        ->name('admin.payment.edit');
        Route::put('update/{id}', [Payment_infoController::class, 'update'])
        ->name('admin.payment.update');
        Route::get('delete/{id}', [Payment_infoController::class, 'delete'])
        ->name('admin.payment.delete');
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