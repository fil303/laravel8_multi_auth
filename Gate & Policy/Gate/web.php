<?php


use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


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

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('can:res-user');



////   Admin
//Route::group(['as'=>'admin.','prefix' => '/admin','middleware'=>['auth','admin']], function () {
		//Route::get('/dashboard',function(){return view('Admin.dashboard');})->name('adashboard');
//});


///////  User
//Route::group(['as'=>'user.','prefix' => '/user','middleware'=>['auth','user']], function () {
	//	Route::get('/dashboard',function(){return view('User.dashboard');})->name('udashboard');
//});


///Gate
Route::get('sub',function(Auth $a){
	if(Gate::allows('sub')) {
	 return 'a' ;
	  } else {
	  return 'b' ;
	} ;
});


///      Post

Route::get('/post',fn () => view('post'))->middleware('auth');
Route::post('/post',[PostController::class, 'post'])->middleware('auth');
