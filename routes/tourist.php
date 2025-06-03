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
// Auth::routes();


Route::resource('tourist',App\Http\Controllers\TouristController::class);

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){


        Route::get('4', function () {
            return view('table');
        });

        Route::resource('facility',App\Http\Controllers\FacilityController::class);

        Route::get('/hometourist', [App\Http\Controllers\HomeController::class, 'index'])->name('hometourist');

        Route::get('descover_fac/{city_id}/{category_id}',[App\Http\Controllers\FacilityController::class,'descover_fac'])->name('descover_fac');








    });
