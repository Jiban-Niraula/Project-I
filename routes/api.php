<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

<<<<<<< HEAD


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


=======
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
>>>>>>> 8de0a9524c2f700101684a16472758e507afcee5
