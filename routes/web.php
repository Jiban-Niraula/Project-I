<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function() {

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    //Routes for Categories
    Route::get('faculty', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('add-faculty', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('add-faculty', [App\Http\Controllers\Admin\CategoryController::class, 'store']);// Route to add the category
    Route::get('edit-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);// Route to edit the category
    Route::put('update-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);// Submit the changes made after edit
    Route::get('delete-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);

    //Routes for Posts
    Route::get('post',[App\Http\Controllers\Admin\PostController::class,'index']);
    Route::get('add-post', [App\Http\Controllers\Admin\PostController::class, 'create']);
    Route::post('add-post', [App\Http\Controllers\Admin\PostController::class, 'store']);
    Route::get('edit-post/{post_id}', [App\Http\Controllers\Admin\PostController::class,'edit']);
    Route::put('edit-post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'update']); 
    Route::get('delete-post/{post_id}', [App\Http\Controllers\Admin\PostController::class,'destroy']);

    //Routes for Users
    Route::get('users',[App\Http\Controllers\Admin\UsersController::class,'index']);
});
