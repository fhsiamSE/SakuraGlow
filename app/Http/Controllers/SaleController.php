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
        $sales = Sale::orderBy('date','desc')->paginate(10);
        // $totalAmount = $sales->sum('amount');
        $totalAmount = number_format($sales->sum('amount'), 0, '.', ',');
        
        return view('sales', compact('sales' , 'totalAmount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch full Product and Seller objects
        $products = Product::orderBy('product_name', 'asc')->get();
        $sellers = Seller::orderBy('name', 'asc')->get();

        // Pass them to the view
        return view('addSaleInfo', compact('products', 'sellers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $sale = new Sale();
        // Create the sale record
            $sale->product_name = $request->input('product_name');
            $sale->seller_name = $request->input('seller_name');
            $sale->amount = $request->input('amount');
            $sale->quantity = $request->input('quantity');
            $sale->date = $request->input('date');
            $sale->status = $request->input('status');
            $sale->note = $request->input('note');

            $sale->save();
        // Redirect with a success message
        return redirect()->route('sales.index')->with('success', 'Sale has been added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sales = Sale::findOrFail($id);
        return view('salesDetails', compact('sales'));
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
        $sale = Sale::findOrFail($id);
        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Sale has been deleted successfully!');
    }
}