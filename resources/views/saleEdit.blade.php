@extends('layout')

@section('content')

<div class="container-fluid">

  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h3 class="mb-0">Edit Sale</h3>
      <small class="text-muted">Update sale transaction details</small>
    </div>
  </div>

  <!-- Form Card -->
  <div class="card shadow-sm">
    <div class="card-body">

      <form action="{{ route('sales.update', $sale->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-3">

          <!-- Product Name -->
          <div class="col-md-6">
            <label class="form-label fw-semibold">Product Name</label>
            <input type="text"
                   name="product_name"
                   class="form-control @error('product_name') is-invalid @enderror"
                   value="{{ old('product_name', $sale->product_name) }}"
                   placeholder="Enter product name"
                   required>
            @error('product_name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <!-- Seller Name -->
          <div class="col-md-6">
            <label class="form-label fw-semibold">Seller Name</label>
            <input type="text"
                   name="seller_name"
                   class="form-control @error('seller_name') is-invalid @enderror"
                   value="{{ old('seller_name', $sale->seller_name) }}"
                   placeholder="Enter seller name"
                   required>
            @error('seller_name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <!-- Quantity -->
          <div class="col-md-6">
            <label class="form-label fw-semibold">Quantity</label>
            <input type="number"
                   name="quantity"
                   class="form-control @error('quantity') is-invalid @enderror"
                   value="{{ old('quantity', $sale->quantity) }}"
                   placeholder="Enter quantity"
                   required>
            @error('quantity')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <!-- Amount -->
          <div class="col-md-6">
            <label class="form-label fw-semibold">Amount (Tk)</label>
            <input type="number"
                   name="amount"
                   class="form-control @error('amount') is-invalid @enderror"
                   value="{{ old('amount', $sale->amount) }}"
                   placeholder="Enter amount"
                   step="0.01"
                   required>
            @error('amount')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <!-- Status -->
          <div class="col-md-6">
            <label class="form-label fw-semibold">Status</label>
            <select name="status" class="form-select @error('status') is-invalid @enderror" required>
              <option value="">Select Status</option>
              <option value="Pending" {{ old('status', $sale->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
              <option value="Paid" {{ old('status', $sale->status) == 'Paid' ? 'selected' : '' }}>Paid</option>
              <option value="Cancelled" {{ old('status', $sale->status) == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
            @error('status')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>


          <!-- Note -->
          <div class="col-12">
            <label class="form-label fw-semibold">Note</label>
            <textarea name="note"
                      class="form-control @error('note') is-invalid @enderror"
                      rows="3"
                      placeholder="Add any additional notes (optional)">{{ old('note', $sale->note) }}</textarea>
            @error('note')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

        </div>

        <!-- Buttons -->
        <div class="mt-4 d-flex justify-content-end gap-2">

          <a href="{{ route('sales.index') }}" class="btn btn-secondary">
            <i class="bi bi-x-circle me-1"></i> Cancel
          </a>

          <button type="submit" class="btn btn-primary">
            <i class="bi bi-check-circle me-1"></i> Update Sale
          </button>

        </div>

      </form>

    </div>
  </div>

</div>

@endsection
