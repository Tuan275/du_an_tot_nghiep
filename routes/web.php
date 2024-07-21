<?php

use App\Http\Controllers\AboutStudioController;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Payment_infoController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ReviewController;
use App\Models\AboutStudio;
use App\Models\Reviews;

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

Route::get('/', [ClientController::class, 'show_home'])
    ->name('client.home');
Route::get('album', [ClientController::class, 'show_product'])
    ->name('client.album');
Route::get('userDetail', [ClientController::class, 'show_appointment'])
    ->name('client.userDetail');
Route::get('price', [ClientController::class, 'show_price'])
    ->name('client.price');
Route::get('dashboard', [ClientController::class, 'dashboard'])
    ->name('admin.dashboard.home');
Route::get('about', [ClientController::class, 'show_about'])
    ->name('client.about');


//dashboard


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
        Route::get('/update_role/{id}/{role}', [UserController::class, 'update_role'])
            ->name('admin.user.update_role');
    });

    //Categories
    Route::prefix('categories')->group(function () {
        Route::get('list', [CategoriesController::class, 'index'])
            ->name('admin.categories.list');
        Route::get('create', [CategoriesController::class, 'create'])
            ->name('admin.categories.create');
        Route::post('store', [CategoriesController::class, 'store'])
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
        Route::get('list', [PhotoController::class, 'index'])
            ->name('admin.photographer.list');
        Route::get('create', [PhotoController::class, 'create'])
            ->name('admin.photographer.create');
        Route::post('store', [PhotoController::class, 'store'])
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
        Route::get('list', [ServicesController::class, 'index'])
            ->name('admin.service.list');
        Route::get('create', [ServicesController::class, 'create'])
            ->name('admin.service.create');
        Route::post('store', [ServicesController::class, 'store'])
            ->name('admin.service.store');
        Route::get('edit/{id}', [ServicesController::class, 'edit'])
            ->name('admin.service.edit');
        Route::put('update/{id}', [ServicesController::class, 'update'])
            ->name('admin.service.update');
        Route::get('/update_status/{id}/{status}', [ServicesController::class, 'update_status'])
            ->name('admin.service.update_status');
        Route::get('delete/{id}', [ServicesController::class, 'delete'])
            ->name('admin.service.delete');
    });

    //Product
    Route::prefix('product')->group(function () {
        Route::get('list', [ProductsController::class, 'index'])
            ->name('admin.products.list');
        Route::get('create', [ProductsController::class, 'create'])
            ->name('admin.products.create');
        Route::post('store', [ProductsController::class, 'store'])
            ->name('admin.products.store');
        Route::get('edit/{id}', [ProductsController::class, 'edit'])
            ->name('admin.products.edit');
        Route::put('update/{id}', [ProductsController::class, 'update'])
            ->name('admin.products.update');
        Route::get('delete/{id}', [ProductsController::class, 'delete'])
            ->name('admin.products.delete');
    });

    //appointments
    Route::prefix('appointment')->group(function () {
        Route::get('list', [AppointmentsController::class, 'index'])
            ->name('admin.appointment.list');
        Route::get('create', [AppointmentsController::class, 'create'])
            ->name('client.contact');
        Route::post('store', [AppointmentsController::class, 'store'])
            ->name('client.appointment.store');
        Route::get('edit/{id}', [AppointmentsController::class, 'edit'])
            ->name('admin.appointment.edit');
        Route::put('update/{id}', [AppointmentsController::class, 'update'])
            ->name('admin.appointment.update');
        Route::get('/update_status/{id}/{status}', [AppointmentsController::class, 'update_status'])
            ->name('admin.appointment.update_status');
        Route::get('delete/{id}', [AppointmentsController::class, 'delete'])
            ->name('admin.appointment.delete');
        
        Route::get('search', [AppointmentsController::class, 'search'])->name('admin.appointment.search');

        Route::patch('/appointment/{id}/updatePhotograp', [AppointmentsController::class, 'updatePhotograp'])
            ->name('admin.appointment.updatePhotograp');
        Route::delete('/admin/appointments/deleteAll', [AppointmentsController::class, 'deleteAll'])->name('admin.appointment.deleteAll');

        Route::post('/appointments/{id}', [AppointmentsController::class, 'updateClient'])
        ->name('client.appointment.updateAppointment');

        Route::get('/appointments/{id}', [AppointmentsController::class, 'destroy'])
        ->name('client.appointment.delete');

    });

    //Review
    Route::prefix('review')->group(function () {
        Route::get('list', [ReviewController::class, 'index'])
            ->name('admin.review.list');
        Route::post('store', [ReviewController::class, 'store'])
            ->name('client.review.store');
        Route::get('/update_status/{id}/{status}', [ReviewController::class, 'update_status'])
            ->name('admin.review.update_status');

});

    //aboutStudio
    Route::prefix('about')->group(function () {
        Route::get('list', [AboutStudioController::class, 'index'])
            ->name('admin.about.list');
        Route::get('create', [AboutStudioController::class, 'create'])
            ->name('admin.about.create');
        Route::post('store', [AboutStudioController::class, 'store'])
            ->name('admin.about.store');
        Route::get('edit/{id}', [AboutStudioController::class, 'edit'])
            ->name('admin.about.edit');
        Route::put('update/{id}', [AboutStudioController::class, 'update'])
            ->name('admin.about.update');
        Route::get('delete/{id}', [AboutStudioController::class, 'delete'])
            ->name('admin.about.delete');
        Route::get('/update_status/{id}/{status}', [AboutStudioController::class, 'update_status'])
            ->name('admin.about.update_status');
});






});


Route::get('search', [ServicesController::class, 'search'])->name('client.search');


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



Route::get('auth/google', [UserController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [UserController::class, 'handleGoogleCallback']);

Route::get('auth/facebook', [UserController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [UserController::class, 'handleFacebookCallback']);
// Route::prefix(('client'))->group(function () {
//     Route::get('/')
//         ->name('client.home');
// });


// Route::get('send_mail/{id}', [SendMailController::class, 'send_mail']);