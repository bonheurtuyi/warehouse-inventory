<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\reports\ProductsReportController;
use App\Http\Livewire\OrderSalesReport;
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

        Route::prefix('orders')->group(function (){
            Route::get('/pending', [OrderController::class, 'pending'])->name('orders.pending');
            Route::get('/approved', [OrderController::class, 'approved'])->name('orders.approved');
        }),
        Route::resource('orders', OrderController::class),

        Route::get('invoices/pending', [InvoiceController::class, 'pending'])->name('invoices.pending'),
        Route::get('invoices/approved', [InvoiceController::class, 'approved'])->name('invoices.approved'),
        Route::resource('invoices', InvoiceController::class),

        /*Routes for reports*/
        Route::get('stock/report', [ProductsReportController::class, 'stock'])->name('stock.report'),
        Route::get('sales/report', [ProductsReportController::class, 'sales'])->name('sales.report'),
        Route::get('sales/report/between_dates', [ProductsReportController::class, 'results'])->name('sales.results'),


    ]
);





