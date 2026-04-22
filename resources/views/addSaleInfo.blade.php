@extends('layout')

@section('content')

<div class="container-fluid">

  <!-- Header -->
  <div class="mb-4">
    <h3 class="mb-0">Add Sale</h3>
    <small class="text-muted">Create a new sales record</small>
  </div>

  <!-- Form Card -->
  <div class="card shadow-sm">
    <div class="card-body">

      <form action="{{ route('sales.store') }}" method="POST">
        <div class="row g-3">
          @csrf

          <!-- Product Name (Input + Dropdown) -->
          <div class="col-md-6">
            <label class="form-label">Product Name</label>
            <select name="product_name" class="form-select" required>
                <option value="">Select Product</option>
                @foreach ($products as $product)
                  <option value="{{ $product->product_name }}">{{ $product->product_name }}</option>
                @endforeach
            </select>
          </div>

          <!-- Seller -->
          <div class="col-md-6">
            <label class="form-label">Seller</label>
            <select name="seller_name" class="form-select" required>
              <option value="">Select Seller</option>
              @foreach ($sellers as $seller)
                 <option value="{{ $seller->name }}">{{ $seller->name }}</option>
              @endforeach
            </select>
          </div>

          <!-- Total Amount -->
          <div class="col-md-6">
            <label class="form-label">Total Amount</label>
            <input name="amount" type="number" class="form-control" placeholder="Enter total amount" required>
          </div>

          <!-- Quantity -->
          <div class="col-md-6">
            <label class="form-label">Quantity</label>
            <input name="quantity" type="number" class="form-control" placeholder="Enter quantity" required>
          </div>

          <!-- Sale Date -->
          <div class="col-md-6">
            <label class="form-label">Sale Date</label>
            <input name="date" type="date" class="form-control" required>
          </div>

          <!-- Payment Status -->
          <div class="col-md-6">
            <label class="form-label">Payment Status</label>
            <select name="status" class="form-select" required>
              <option value="">Select Status</option>
              <option value="Paid">Paid</option>
              <option value="Pending">Pending</option>
            </select>
          </div>

          <!-- Notes -->
          <div class="col-12">
            <label class="form-label">Notes</label>
            <textarea name="note" class="form-control" rows="3" placeholder="Optional notes..."></textarea>
          </div>

        </div>

        <!-- Buttons -->
        <div class="mt-4 d-flex justify-content-end gap-2">
          <button type="submit" class="btn btn-primary">
            <i class="bi bi-check-circle me-1"></i> Save Sale
          </button>
        </div>

      </form>

    </div>
  </div>

</div>

@endsection