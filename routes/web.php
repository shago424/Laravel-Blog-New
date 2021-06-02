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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('public');

Route::get('/blog-post/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'single_post'])->name('single_post');

Route::get('/all-categories/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'allcategory'])->name('all-category');

Route::get('/all-tag-post/{name}', [App\Http\Controllers\Frontend\FrontendController::class, 'alltag'])->name('all-tag');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ///////////////////Admin Section ////////////////

Route::group(['prefix'=>'admin','middleware'=>['admin','auth'],'namespace'=>'admin'],function(){ 
    Route::get('dashboard',[App\Http\Controllers\admin\AdminDashboardController::class,'index'])->name('admin.dashboard');
    Route::get('profile',[App\Http\Controllers\admin\AdminDashboardController::class,'profile'])->name('admin.profile');
    Route::post('update/profile',[App\Http\Controllers\admin\AdminDashboardController::class,'profileupdate'])->name('admin.profile.update');
     Route::post('update/password',[App\Http\Controllers\admin\AdminDashboardController::class,'passwordupdate'])->name('admin.password.update');
  


     // Category section

    Route::get('category-list',[App\Http\Controllers\admin\CategoryController::class,'index'])->name('category.list');
    Route::get('category-create',[App\Http\Controllers\admin\CategoryController::class,'create'])->name('category.create');
     Route::post('category/store',[App\Http\Controllers\admin\CategoryController::class,'store'])->name('category.store');
    Route::post('category/update/{id}',[App\Http\Controllers\admin\CategoryController::class,'update'])->name('category.update');
    Route::get('category/delete/{id}',[App\Http\Controllers\admin\CategoryController::class,'delete'])->name('category.delete');
     Route::get('category/active/{id}',[App\Http\Controllers\admin\CategoryController::class,'active'])->name('category.active');
     Route::get('category/inactive/{id}',[App\Http\Controllers\admin\CategoryController::class,'inactive'])->name('category.inactive');


     // Post section

    Route::get('post-list',[App\Http\Controllers\admin\PostController::class,'index'])->name('post.list');
    Route::get('post-create',[App\Http\Controllers\admin\PostController::class,'create'])->name('post.create');
    Route::get('post-edit/{id}',[App\Http\Controllers\admin\PostController::class,'edit'])->name('post.edit');
     Route::post('post/store',[App\Http\Controllers\admin\PostController::class,'store'])->name('post.store');
    Route::post('post/update/{id}',[App\Http\Controllers\admin\PostController::class,'update'])->name('post.update');
    Route::get('post/delete/{id}',[App\Http\Controllers\admin\PostController::class,'delete'])->name('post.delete');
     Route::get('post/active/{id}',[App\Http\Controllers\admin\PostController::class,'active'])->name('post.active');
     Route::get('post/inactive/{id}',[App\Http\Controllers\admin\PostController::class,'inactive'])->name('post.inactive');
    





    // Category section

    Route::get('user-list',[App\Http\Controllers\admin\UserController::class,'index'])->name('user.list');
    Route::get('user-create',[App\Http\Controllers\admin\UserController::class,'create'])->name('user.create');
    Route::post('update/{id}',[App\Http\Controllers\admin\UserController::class,'update'])->name('user.update');
    Route::get('delete/{id}',[App\Http\Controllers\admin\UserController::class,'delete'])->name('user.delete');
    Route::get('active/{id}',[App\Http\Controllers\admin\UserController::class,'active'])->name('user.active');
    Route::get('inactive/{id}',[App\Http\Controllers\admin\UserController::class,'inactive'])->name('user.inactive');

    // Profile

     


});

// ///////////////////User Section ////////////////

Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'user'],function(){ 
    Route::get('user/dashboard',[App\Http\Controllers\user\UserDashboardController::class,'index'])->name('user.dashboard');

});
