<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product;
use App\Http\Controllers\Sale;
use App\Http\Controllers\Transaction;
use App\Http\Controllers\Stock;

Route::get('/', function () {
    return view('dashboard');
})->name('Dashboard');


Route::Resource('products', App\Http\Controllers\ProductController::class);
Route::Resource('sales', App\Http\Controllers\SaleController::class);
Route::Resource('transactions', App\Http\Controllers\TransactionController::class);
Route::resource('stocks', App\Http\Controllers\StockController::class);
Route::resource('catagories', App\Http\Controllers\CategorieController::class);