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

      <form>

        <div class="row g-3">

          <!-- Product -->
          <div class="col-md-6">
            <label class="form-label">Product</label>
            <select class="form-select">
              <option>Select Product</option>
              <option>Glow Serum</option>
              <option>Hair Oil</option>
              <option>Face Cream</option>
            </select>
          </div>

          <!-- Seller -->
          <div class="col-md-6">
            <label class="form-label">Seller</label>
            <select class="form-select">
              <option>Select Seller</option>
              <option>Admin</option>
              <option>Rahim</option>
              <option>Kamal</option>
            </select>
          </div>

          <!-- Quantity -->
          <div class="col-md-6">
            <label class="form-label">Quantity</label>
            <input type="number" class="form-control" placeholder="Enter quantity">
          </div>

          <!-- Transaction Type -->
          <div class="col-md-6">
            <label class="form-label">Transaction Type</label>
            <select class="form-select">
              <option>Select Type</option>
              <option value="in">IN (Stock Added)</option>
              <option value="out">OUT (Stock Removed)</option>
              <option value="adjustment">ADJUSTMENT</option>
            </select>
          </div>

          <!-- Notes (optional UI improvement) -->
          <div class="col-12">
            <label class="form-label">Notes</label>
            <textarea class="form-control" rows="3" placeholder="Optional remarks..."></textarea>
          </div>

        </div>

        <!-- Buttons -->
        <div class="mt-4 d-flex justify-content-end gap-2">

          <button type="button" class="btn btn-secondary">
            Cancel
          </button>

          <button type="submit" class="btn btn-primary">
            <i class="bi bi-check-circle me-1"></i> Save Transaction
          </button>

        </div>

      </form>

    </div>
  </div>

</div>

@endsection