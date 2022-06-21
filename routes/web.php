<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
    return view('auth.login');
});

Route::middleware(['middleware' => 'prevent-back-history'])->group( function(){
	Auth::routes();
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'admin','middleware'=>['isAdmin','auth','prevent-back-history']],function(){
	Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
	Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
	Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
	

	Route::group(['prefix'=>'category','as' => 'category.'],function(){
		Route::get('/', [CategoryController::class, 'index'])->name('index');
		Route::post('/store', [CategoryController::class, 'store'])->name('store');
		Route::post('/update', [CategoryController::class, 'update'])->name('update');
		Route::post('/destroy', [CategoryController::class, 'destroy'])->name('destroy');
	});
	Route::group(['prefix'=>'products','as' => 'products.'],function(){
		Route::get('/',[ProductController::class,'index'])->name('index');
		Route::post('/store',[ProductController::class,'store'])->name('store');
	});

});
Route::group(['prefix'=>'user','middleware'=>['isUser','auth','prevent-back-history']],function(){
	Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
	Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
	Route::get('/settings', [UserController::class, 'settings'])->name('user.settings');
});
