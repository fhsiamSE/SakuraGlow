<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product;
use App\Http\Controllers\Sale;
use App\Http\Controllers\Transaction;
use App\Http\Controllers\Stock;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\ValidUser;
Route::get('/', function () {
    return  view('login');
})->name('login');

Route::get('/registration', function () {
    return view('adminRegistration');
});

Route::post('/register', [App\Http\Controllers\AdminController::class, 'register'])->name('admin.register');
Route::post('/login', [App\Http\Controllers\AdminController::class, 'authCheck'])->name('authCheck');


Route::middleware(ValidUser::class)->group(function(){

Route::get('/dashboard', [DashboardController::class, 'show'])->name('Dashboard');
Route::Resource('products', App\Http\Controllers\ProductController::class);
Route::Resource('sales', App\Http\Controllers\SaleController::class);
Route::Resource('transactions', App\Http\Controllers\TransactionController::class);
Route::resource('stocks', App\Http\Controllers\StockController::class);
Route::resource('categories', App\Http\Controllers\CategorieController::class);
Route::get('/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('logout');

});