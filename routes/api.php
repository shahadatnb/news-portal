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
    /*
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/category/{slug}', [CategoryController::class, 'show']);
    Route::get('/post/{slug}', [PostController::class, 'show']);
    Route::get('/search', [SearchController::class, 'index']);
    */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
