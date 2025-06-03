<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// استور\ناه لاوث
use App\Http\Controllers\API\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(
    [

    ], function(){


        Route::get('/cities',[App\Http\Controllers\API\CityController::class,'index'])->name('cities');

        Route::post('/storecity',[App\Http\Controllers\API\CityController::class,'store'])->name('storecity');
        Route::post('/updatecity/{id}',[App\Http\Controllers\API\CityController::class,'update'])->name('updatecity');
        Route::post('/deletecity/{id}',[App\Http\Controllers\API\CityController::class,'destroy'])->name('deletecity');


    });

    Route::controller(AuthController::class)->group(function () {
        Route::post('login', 'login');
        Route::post('register', 'register');
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');
    });

