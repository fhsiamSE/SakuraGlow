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

      <form action="{{route('sales.store')}}" method="POST">
        <div class="row g-3">
@csrf
    <!-- Product Name (Input + Dropdown) -->
    <div class="col-md-6">
    <label class="form-label">Product Name</label>

    <label class="form-label">Product</label>
            <select name="product_id" class="form-select" name="product" required>
                <option value="">Select Product</option>
                @foreach ($products as $product )
                  <option value="">{{$product}}</option>
                @endforeach

            </select>
    </div>

          <!-- Seller -->
          <div class="col-md-6">
            <label class="form-label">Seller</label>
            <select class="form-select" name = "seller">
              <option>Select Seller</option>
              @foreach ($sellers as $seller)
                 <option>{{$seller}}</option>
              @endforeach
             
            </select>
          </div>

          <!-- Total Amount -->
          <div class="col-md-6">
            <label class="form-label">Total Amount</label>
            <input name="total_amount" type="number" class="form-control" placeholder="Enter total amount">
          </div>


          <!-- Quantity -->
          <div class="col-md-6">
            <label class="form-label">Quantity</label>
            <input name="quantity" type="number" class="form-control" placeholder="Enter quantity">
          </div>

          <!-- Sale Date -->
          <div class="col-md-6">
            <label class="form-label">Sale Date</label>
            <input type="date" class="form-control">
          </div>

          <!-- Payment Status -->
          <div class="col-md-6">
            <label class="form-label">Payment Status</label>
            <select class="form-select" name="payment_status">
              <option>Select Status</option>
              <option>Paid</option>
              <option>Pending</option>
            </select>
          </div>

          <!-- Notes -->
          <div class="col-12">
            <label class="form-label">Notes</label>
            <textarea name="note" class="form-control" rows="3" placeholder="Optional notes..."></textarea>
          </div>

        </div>

        <!-- Products Section (Static UI) -->
        

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