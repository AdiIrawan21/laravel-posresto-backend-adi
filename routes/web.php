<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.auth.login');
});

Route::middleware(['auth', 'cekLevel:admin'])->group(function () {

    Route::resource('user', UserController::class);
});

Route::middleware(['auth', 'cekLevel:admin,staff'])->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    Route::resource('products', ProductController::class, 'index');
    Route::resource('categories', CategoryController::class);
    Route::resource('reports', ReportController::class);
});
