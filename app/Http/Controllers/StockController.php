<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;

class StockController extends Controller
{
   public function index()
{
    $products = Product::orderBy('product_name', 'asc')
                        ->paginate(10);

    $allProducts = Product::all(); // for global stats

    $stockData = [];
    $lowStock = 0;
    $outOfStock = 0;
    $totalStock = 0;

    foreach ($allProducts as $product) {

        $in = Transaction::where('product_id', $product->id)
            ->where('transaction_type', 'in')
            ->sum('quantity');

        $out = Transaction::where('product_id', $product->id)
            ->where('transaction_type', 'out')
            ->sum('quantity');

        $adjust = Transaction::where('product_id', $product->id)
            ->where('transaction_type', 'adjustment')
            ->sum('quantity');

        $stock = ($in - $out + $adjust);

        $totalStock += $stock;

        if ($stock <= 0) {
            $outOfStock++;
        } elseif ($stock < 5) {
            $lowStock++;
        }
    }

    // Only build table data from paginated products
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

    return view('stocks', compact(
        'stockData',
        'totalStock',
        'products',
        'lowStock',
        'outOfStock'
    ));
}
}