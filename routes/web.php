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
    Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);// Route to add the category
    Route::get('edit-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);// Route to edit the category
    Route::put('update-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);// Submit the changes made after edit
    Route::get('delete-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);

    // Routes for the subcategories
    Route::get('subcategory', [App\Http\Controllers\Admin\SubCategoryController::class, 'index']);
    Route::get('add-subcategory', [App\Http\Controllers\Admin\SubCategoryController::class, 'create']);
    Route::post('add-subcategory', [App\Http\Controllers\Admin\SubCategoryController::class, 'store']);
    Route::get('edit-subcategory/{subcategory_id}', [App\Http\Controllers\Admin\SubCategoryController::class, 'edit']);
    Route::put('update-subcategory/{subcategory_id}', [App\Http\Controllers\Admin\SubCategoryController::class, 'update']);
    Route::get('delete-subcategory/{subcategory_id}', [App\Http\Controllers\Admin\SubCategoryController::class, 'destroy']);

    //Routes for Posts
    Route::get('post',[App\Http\Controllers\Admin\PostController::class,'index']);
    Route::get('add-post', [App\Http\Controllers\Admin\PostController::class, 'create']);
    Route::post('add-post', [App\Http\Controllers\Admin\PostController::class, 'store']);
    Route::get('edit-post/{post_id}', [App\Http\Controllers\Admin\PostController::class,'edit']);
    Route::put('edit-post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'update']);    ;
    Route::get('delete-post/{post_id}', [App\Http\Controllers\Admin\PostController::class,'destroy']);

});
