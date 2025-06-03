<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;

use App\Http\Controllers\OwnerController;


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

// Route::get('/', function () {
//     return view('welcome');
// });




Route::resource('owner',OwnerController::class);

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){


    // +++++ start lang+++++++++



    Route::resource('facility',App\Http\Controllers\FacilityController::class);





    });
    // ++++++  End lang++++++++




    // Route::resource('/try','TestyController@triii');



