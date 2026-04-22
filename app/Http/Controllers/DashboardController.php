<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categorie;
use App\Models\Sale;

class DashboardController extends Controller
{
    public function show(){
        $totalProducts = Product::count();
        $totalCategoris = Categorie::count();
        $totalSales = Sale::count();
        $sales = Sale::all();
        $totalAmount = $sales->sum('amount');
        return view('dashboard',
        compact( 
            'totalProducts', 
            'totalCategoris', 
            'totalSales', 
            'totalAmount'
            ) );
    }
}
