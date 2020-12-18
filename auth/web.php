<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminloginController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::prefix('/admin')->group(function () {

		Route::get('/login',fn () => view('admin.login') )->name('admin.login')->middleware('guest:admin');
		Route::post('/login', [AdminloginController::class,'login']);

		Route::post('/logout', [AdminloginController::class,'logout']);

		Route::get('/home',fn () => view('admin.home') )->middleware('auth:admin');

});
