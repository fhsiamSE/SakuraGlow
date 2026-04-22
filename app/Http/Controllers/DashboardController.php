<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categorie;

class DashboardController extends Controller
{
    public function show(){
         $totalProducts = Product::count();
         $totalCategoris = Categorie::count();
        return view('dashboard',compact( 'totalProducts', 'totalCategoris') );
    }
}
