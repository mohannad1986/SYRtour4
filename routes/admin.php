<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use  Illuminate\Support\Facades\Auth;


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
// Auth::routes();

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){


    // +++++ start lang+++++++++




Route::resource('city',CityController::class);

Route::resource('town',App\Http\Controllers\TownController::class);

Route::resource('category',App\Http\Controllers\CategoryController::class);
Route::get('cits_categories_index',[App\Http\Controllers\CategoryController::class,'cits_categories_index'])->name('cits_categories_index');
Route::post('cits_categories_create',[App\Http\Controllers\CategoryController::class,'cits_categories_create'])->name('cits_categories_create');
Route::post('cits_categories_update',[App\Http\Controllers\CategoryController::class,'cits_categories_update'])->name('cits_categories_update');
Route::post('cits_categories_delete',[App\Http\Controllers\CategoryController::class,'cits_categories_delete'])->name('cits_categories_delete');

Route::resource('facility',App\Http\Controllers\FacilityController::class);



Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard')->middleware('auth:web');





    });
    // ++++++  End lang++++++++





