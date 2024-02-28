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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Login API
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);

//Logout API
Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout'])->middleware('auth:sanctum');

//Product API
Route::apiResource('/api-products', App\Http\Controllers\Api\ProductsController::class)->middleware('auth:sanctum');

//categories api
Route::apiResource('/api-categories', App\Http\Controllers\Api\CategoriesController::class)->middleware('auth:sanctum');

//orders api
Route::post('/save-order', [App\Http\Controllers\Api\OrderController::class, 'saveOrder'])->middleware('auth:sanctum');

// discount api
Route::get('/api-discounts', [App\Http\Controllers\Api\DiscountController::class, 'index'])->middleware('auth:sanctum');