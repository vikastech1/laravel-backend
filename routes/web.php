<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InformationController;
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

Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');




Route::get('/admin/list',[UserController::class,'showlist']);

// .....................................Delete data in table........................................//
Route::get('/admin/delete/{id}',[UserController::class,'delete']);
//------------------------------status---------------------------------
Route::get('/admin/status-update/{id}',[UserController::class,'status_update']);

// .....................................Update data in table........................................//
Route::get('/admin/edit/{id}',[UserController::class,'showdata']);
Route::post('/admin/edit',[UserController::class,'update']);
//................................Registeration staff--------------------//
Route::get('/admin/reg',[UserController::class,'show_reg']);
Route::post('/admin/reg',[UserController::class,'register']);

//----------------------------------User_Application---------------------------------
Route::get('/show',[App\Http\Controllers\InformationController::class, 'index']);
Route::post('/addUser',[App\Http\Controllers\InformationController::class,'store']);




Route::get('/admin/UserTable',[InformationController::class,'UserTable']);

// .....................................Delete data in table........................................//
Route::get('/admin/UserDelete/{id}',[InformationController::class,'UserDelete']);

// .....................................Update data in table........................................//
Route::get('/admin/UserEdit/{id}',[InformationController::class,'UserShowdata']);
Route::post('/admin/UserEdit',[InformationController::class,'update']);

Route::post('/admin/search-record',[InformationController::class,'search']);

