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

Route::get('/', function () {
    return view('welcome');
})->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Админка
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::group(['as' => 'admin.'], function() {
        Route::get('/', \App\Http\Controllers\Admin\IndexController::class)->name('admin.index');
        Route::resource('companies', \App\Http\Controllers\Admin\CompanyController::class); // CRUD model Company

        // docs: https://laravel.com/docs/10.x/controllers
        Route::resource('companies.photos', \App\Http\Controllers\Admin\PhotoController::class)->shallow(); // CRUD model Photo
        Route::resource('companies.excursions', \App\Http\Controllers\Admin\ExcursionController::class)->shallow(); // CRUD model Excursion
    });
});
