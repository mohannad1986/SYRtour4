<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OwnerController;
use  Illuminate\Support\Facades\Auth;
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
Auth::routes();

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', function () {
    return view('log');
})->middleware('guest');

Route::get('rego', function () {
    return view('reg');
})->name('rego')->middleware('guest');

Route::get('loginshow', function () {
    return view('log');
})->name('loginshow')->middleware('guest');


Route::post('/login',[App\Http\Controllers\Auth\LoginController::class,'login'])->name('login')->middleware('guest');
Route::get('/logoutguard/{type}',[App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logoutguard');












Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        Route::get('/hometourist', [App\Http\Controllers\HomeController::class, 'index'])->name('hometourist');

        // Route::get('descover_fac/{city_id}/{category_id}',[App\Http\Controllers\FacilityController::class,'descover_fac'])->name('descover_fac');





    });











// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// +++++++++++++++++++
