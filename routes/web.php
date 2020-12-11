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


    Route::prefix('admin')->group(function () {

        Route::get('login', [\App\Http\Controllers\LoginController::class, 'index'])->name('admin_login');
        Route::post('login_post', [\App\Http\Controllers\LoginController::class, 'store'])->name('admin_login_post');
        Route::get('logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('admin_logout');

        // auth.base  登录中间件 ： 传参
        Route::middleware(['auth.basic:admin'])->group(function () {
            Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
            Route::resource('news', \App\Http\Controllers\NewsController::class);
        });
    });

});

