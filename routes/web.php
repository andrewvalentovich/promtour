<?php

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

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Профиль
Route::group(['prefix' => 'profile', 'middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
});

// Страницы компаний
Route::group(['prefix' => 'company'], function () {
    Route::get('/catalog', [App\Http\Controllers\CompanyController::class, 'index'])->name('company.index');
    Route::get('/{slug}', [App\Http\Controllers\CompanyController::class, 'detail'])->name('company.detail');
    Route::get('/{slug}/excursions', [App\Http\Controllers\CompanyController::class, 'excursions'])->name('company.excursions');
});

// Страницы экскурсий
Route::group(['prefix' => 'excursion'], function () {
    Route::get('/catalog', [App\Http\Controllers\ExcursionController::class, 'index'])->name('excursion.index');
    Route::get('/{slug}', [App\Http\Controllers\ExcursionController::class, 'detail'])->name('excursion.detail');
});

Route::get('/catalog', [App\Http\Controllers\CatalogController::class, 'index'])->name('catalog.index');
Route::get('/excursions', [App\Http\Controllers\ExcursionController::class, 'index'])->name('excursions.index');

// Админка
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::group(['as' => 'admin.'], function() {
        Route::get('/', \App\Http\Controllers\Admin\IndexController::class)->name('admin.index');
        Route::resource('companies', \App\Http\Controllers\Admin\CompanyController::class); // CRUD model Company
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class); // CRUD model User
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class); // CRUD model Category

        // docs: https://laravel.com/docs/10.x/controllers
        Route::resource('companies.excursions', \App\Http\Controllers\Admin\ExcursionController::class)->shallow(); // CRUD model Excursion

//        Route::resource('users.bookings', \App\Http\Controllers\Admin\BookingController::class)->shallow(); // CRUD model Booking

        Route::get('/companies/{company}/photos', [\App\Http\Controllers\Admin\CompanyPhotoController::class, 'index'])->name('companies.photos.index'); // CRUD model CompanyPhoto
        Route::get('/companies/{company}/photos/create', [\App\Http\Controllers\Admin\CompanyPhotoController::class, 'create'])->name('companies.photos.create');
        Route::post('/companies/{company}/photos', [\App\Http\Controllers\Admin\CompanyPhotoController::class, 'store'])->name('companies.photos.store');
        Route::get('/companies/photos/{photo}/', [\App\Http\Controllers\Admin\CompanyPhotoController::class, 'show'])->name('companies.photos.show');
        Route::get('/companies/photos/{photo}/edit', [\App\Http\Controllers\Admin\CompanyPhotoController::class, 'edit'])->name('companies.photos.edit');
        Route::patch('/companies/photos/{photo}', [\App\Http\Controllers\Admin\CompanyPhotoController::class, 'update'])->name('companies.photos.update');
        Route::delete('/companies/photos/{photo}', [\App\Http\Controllers\Admin\CompanyPhotoController::class, 'destroy'])->name('companies.photos.destroy');

        Route::get('/excursions/{excursion}/photos', [\App\Http\Controllers\Admin\ExcursionPhotoController::class, 'index'])->name('excursions.photos.index'); // CRUD model ExcursionPhoto
        Route::get('/excursions/{excursion}/photos/create', [\App\Http\Controllers\Admin\ExcursionPhotoController::class, 'create'])->name('excursions.photos.create');
        Route::post('/excursions/{excursion}/photos', [\App\Http\Controllers\Admin\ExcursionPhotoController::class, 'store'])->name('excursions.photos.store');
        Route::get('/excursions/photos/{photo}/', [\App\Http\Controllers\Admin\ExcursionPhotoController::class, 'show'])->name('excursions.photos.show');
        Route::get('/excursions/photos/{photo}/edit', [\App\Http\Controllers\Admin\ExcursionPhotoController::class, 'edit'])->name('excursions.photos.edit');
        Route::patch('/excursions/photos/{photo}', [\App\Http\Controllers\Admin\ExcursionPhotoController::class, 'update'])->name('excursions.photos.update');
        Route::delete('/excursions/photos/{photo}', [\App\Http\Controllers\Admin\ExcursionPhotoController::class, 'destroy'])->name('excursions.photos.destroy');

        Route::get('/bookings', [\App\Http\Controllers\Admin\BookingController::class, 'all'])->name('bookings.index');
        Route::get('/users/{user}/bookings', [\App\Http\Controllers\Admin\BookingController::class, 'index'])->name('users.bookings.index');
        Route::get('/users/{user}/bookings/create', [\App\Http\Controllers\Admin\BookingController::class, 'create'])->name('users.bookings.create');
        Route::get('/bookings/{booking}', [\App\Http\Controllers\Admin\BookingController::class, 'show'])->name('bookings.show');
        Route::get('/bookings/{booking}/edit', [\App\Http\Controllers\Admin\BookingController::class, 'edit'])->name('bookings.edit');
        Route::get('/users/{user}/bookings/company/create', [\App\Http\Controllers\Admin\BookingController::class, 'create_company'])->name('users.bookings.company.create');
        Route::get('/users/{user}/bookings/excursion/create', [\App\Http\Controllers\Admin\BookingController::class, 'create_excursion'])->name('users.bookings.excursion.create');
        Route::post('/users/{user}/bookings/store', [\App\Http\Controllers\Admin\BookingController::class, 'store'])->name('users.bookings.store');
        Route::patch('/bookings/{booking}', [\App\Http\Controllers\Admin\BookingController::class, 'update'])->name('bookings.update');
        Route::delete('/bookings/{booking}', [\App\Http\Controllers\Admin\BookingController::class, 'destroy'])->name('bookings.destroy');
    });
});
