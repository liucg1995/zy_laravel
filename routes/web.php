<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

Route::middleware(['web'])->group(function () {

    Route::get('/test/index', [\App\Http\Controllers\TestController::class, 'index']);
    Route::get('/test/test2', [\App\Http\Controllers\TestController::class, 'test2']);
    Route::get('/test/test3', [\App\Http\Controllers\TestController::class, 'test3']);



});

