<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Auth::routes(
    [
        Route::get('/', [HomeController::class, 'index'])->name('home'),

        Route::resource('categories', CategoryController::class),

        Route::resource('products', ProductController::class),

        Route::resource('units', UnitController::class),

        Route::resource('customers', CustomerController::class),

        Route::resource('orders', OrderController::class),
    ]
);





