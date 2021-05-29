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
  


     // Category section

    Route::get('category-list',[App\Http\Controllers\admin\CategoryController::class,'index'])->name('category.list');
    Route::get('category-create',[App\Http\Controllers\admin\CategoryController::class,'create'])->name('category.create');
     Route::post('category/store',[App\Http\Controllers\admin\CategoryController::class,'store'])->name('category.store');
    Route::post('category/update/{id}',[App\Http\Controllers\admin\CategoryController::class,'update'])->name('category.update');
    Route::get('category/delete/{id}',[App\Http\Controllers\admin\CategoryController::class,'delete'])->name('category.delete');
     Route::get('category/active/{id}',[App\Http\Controllers\admin\CategoryController::class,'active'])->name('category.active');
     Route::get('category/inactive/{id}',[App\Http\Controllers\admin\CategoryController::class,'inactive'])->name('category.inactive');
    





    // Category section

    Route::get('user-list',[App\Http\Controllers\admin\UserController::class,'index'])->name('user.list');
    Route::get('user-create',[App\Http\Controllers\admin\UserController::class,'create'])->name('user.create');
    Route::post('update/{id}',[App\Http\Controllers\admin\UserController::class,'update'])->name('user.update');
    Route::get('delete/{id}',[App\Http\Controllers\admin\UserController::class,'delete'])->name('user.delete');
    Route::get('active/{id}',[App\Http\Controllers\admin\UserController::class,'active'])->name('user.active');
    Route::get('inactive/{id}',[App\Http\Controllers\admin\UserController::class,'inactive'])->name('user.inactive');


});

// ///////////////////User Section ////////////////

Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'user'],function(){ 
    Route::get('user/dashboard',[App\Http\Controllers\user\UserDashboardController::class,'index'])->name('user.dashboard');

});
