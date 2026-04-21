@extends('layout')

@section('content')

<div class="container-fluid">

  <!-- Header -->
  <div class="mb-4">
    <h3 class="mb-0">Add Transaction</h3>
    <small class="text-muted">Record stock IN / OUT / ADJUSTMENT</small>
  </div>

  <!-- Form Card -->
  <div class="card shadow-sm">
    <div class="card-body">

     <form action="{{ route('transactions.store') }}" method="POST">
    @csrf

    <div class="row g-3">

        <!-- Product -->
        <div class="col-md-6">
            <label class="form-label">Product</label>
            <select name="product_id" class="form-select" required>
                <option value="">Select Product</option>
                @foreach ($products as $id => $product)
                    <option value="{{ $id }}">{{ $product }}</option>
                @endforeach
            </select>
        </div>

        <!-- Seller -->
        <div class="col-md-6">
            <label class="form-label">Seller</label>
            <select name="seller_id" class="form-select" required>
                <option value="">Select Seller</option>
                @foreach ($sellers as $id => $seller)
                    <option value="{{ $id }}">{{ $seller }}</option>
                @endforeach
            </select>
        </div>

        <!-- Quantity -->
        <div class="col-md-6">
            <label class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" placeholder="Enter quantity" required>
        </div>

        <!-- Transaction Type -->
        <div class="col-md-6">
            <label class="form-label">Transaction Type</label>
            <select name="transaction_type" class="form-select" required>
                <option value="">Select Type</option>
                <option value="in">IN (Stock Added)</option>
                <option value="out">OUT (Stock Removed)</option>
                <option value="adjustment">ADJUSTMENT</option>
            </select>
        </div>

    </div>

    <div class="mt-4 d-flex justify-content-end gap-2">
        <button type="submit" class="btn btn-primary">
            Save Transaction
        </button>
    </div>
</form>

    </div>
  </div>

</div>

@endsection