<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\CouponsController::class, 'index']);
Route::get('/coupons', [App\Http\Controllers\CouponsController::class, 'coupons'])->name('coupons');
Route::post('/fileuploadcoupons', [App\Http\Controllers\CouponsController::class, 'fileUpload']);
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
Route::post('/fileuploadusers', [App\Http\Controllers\UserController::class, 'fileUpload']);
