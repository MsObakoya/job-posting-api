<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::group(['middleware' => ['auth:sanctum']], function () {

    // Routes that require authentication
    Route::resource('/job', JobController::class);
    Route::post('/logout',[AuthController::class, 'logout']);
});

    // Public Routes
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/job', [JobController::class, 'index']);
    Route::get('/job/{job}', [JobController::class, 'show']);
    Route::post('/job/search', [JobController::class, 'search']);
    Route::post('/job/filter', [JobController::class, 'filter']);


    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
             return $request->user();
         });


