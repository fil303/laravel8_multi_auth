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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['as'=>'admin.','prefix' => '/admin','middleware'=>['auth','admin']], function () {
		Route::get('/dashboard',function(){return view('Admin.dashboard');})->name('adashboard');
});


Route::group(['as'=>'user.','prefix' => '/user','middleware'=>['auth','user']], function () {
		Route::get('/dashboard',function(){return view('User.dashboard');})->name('udashboard');
});
