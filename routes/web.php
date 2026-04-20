<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product;
use App\Http\Controllers\Sale;
use App\Http\Controllers\Transaction;

Route::get('/', function () {
    return view('dashboard');
})->name('Dashboard');

Route::get('/stock', function () {
    return view('stock');
})->name('Stock');


Route::Resource('products', App\Http\Controllers\ProductController::class);
Route::Resource('sales', App\Http\Controllers\SaleController::class);
Route::Resource('transactions', App\Http\Controllers\TransactionController::class);