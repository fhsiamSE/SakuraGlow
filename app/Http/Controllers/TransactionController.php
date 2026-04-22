<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\Seller;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Transaction::with(['product', 'seller'])->orderBy('created_at','desc');
        
        // Search filter
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->whereHas('product', function($q) use ($search) {
                $q->where('product_name', 'like', "%$search%");
            })->orWhereHas('seller', function($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        }
        
        // Type filter
        if ($request->has('type') && !empty($request->type)) {
            $query->where('transaction_type', $request->type);
        }
        
        $transactions = $query->paginate(10)->appends($request->query());
        
        $totalIn = Transaction::where('transaction_type', 'in')->sum('quantity');
        $totalOut = Transaction::where('transaction_type', 'out')->sum('quantity');
        $totalAdjusts = Transaction::where('transaction_type', 'adjustment')->sum('quantity');
        
        return view('transactions', compact(
            'transactions',
            'totalIn',
            'totalOut',
            'totalAdjusts'
        ));
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

    return view('addTransactions', compact('products', 'sellers'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $transaction = new Transaction();

            $transaction->product_id = $request->product_id;
            $transaction->seller_id = $request->seller_id;
            $transaction->quantity = $request->quantity;
            $transaction->transaction_type = $request->transaction_type;

            $transaction->save();

            // ✅ Redirect
            return redirect()
                ->route('transactions.index') // fix spelling
                ->with('success', 'Transaction added successfully.');
            
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
