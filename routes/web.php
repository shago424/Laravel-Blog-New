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

// ///////////////////Admin Section ////////////////

Route::group(['prefix'=>'admin','middleware'=>['admin','auth'],'namespace'=>'admin'],function(){ 
    Route::get('dashboard',[App\Http\Controllers\admin\AdminDashboardController::class,'index'])->name('admin.dashboard');
    // user section
    Route::get('user-list',[App\Http\Controllers\admin\UserController::class,'index'])->name('user.list');
    Route::post('update/{id}',[App\Http\Controllers\admin\UserController::class,'update'])->name('user.update');
    Route::get('delete/{id}',[App\Http\Controllers\admin\UserController::class,'delete'])->name('user.delete');


});

// ///////////////////User Section ////////////////

Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'user'],function(){ 
    Route::get('user/dashboard',[App\Http\Controllers\user\UserDashboardController::class,'index'])->name('user.dashboard');

});
