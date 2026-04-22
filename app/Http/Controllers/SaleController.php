<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Sale;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sales');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $products = Product::orderBy('product_name', 'asc')
        ->pluck('product_name', 'id' ,);

        $sellers = Seller::orderBy('name', 'asc')
        ->pluck('name', 'id', );

        return view('addSaleInfo', compact('products', 'sellers' ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
        'product_id' => 'required',
        'seller_id' => 'required',
        'total_amount' => 'required',
        'quantity' => 'required',
        'sale_date' => 'required|date',
        'payment_status' => 'required',
        'notes' => 'nullable',
    ]);

        // Create the sale record
        Sale::create($validated);

        return redirect()->route('sales.index')->with('success', 'Sale has been added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
