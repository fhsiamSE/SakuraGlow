<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;

class StockController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);

        $stockData = [];

        foreach ($products as $product) {

            $in = Transaction::where('product_id', $product->id)
                ->where('transaction_type', 'in')
                ->sum('quantity');

            $out = Transaction::where('product_id', $product->id)
                ->where('transaction_type', 'out')
                ->sum('quantity');

            $adjust = Transaction::where('product_id', $product->id)
                ->where('transaction_type', 'adjustment')
                ->sum('quantity');

            $stockData[] = [
                'product' => $product->product_name,
                'product_img' => $product->image,
                'stock' => ($in - $out + $adjust)
            ];
        }
        $totalStock = collect($stockData)->sum('stock');
        return view('stocks', compact('stockData', 'totalStock', 'products'));
    }
}