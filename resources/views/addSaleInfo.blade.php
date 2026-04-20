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

      <form>

        <div class="row g-3">


    <!-- Product Name (Input + Dropdown) -->
    <div class="col-md-6">
    <label class="form-label">Product Name</label>

    <div class="dropdown w-100">
        
        <input type="text"
            class="form-control dropdown-toggle"
            placeholder="Type product name..."
            data-bs-toggle="dropdown">

        <ul class="dropdown-menu w-100">

        <li><a class="dropdown-item" href="#">Glow Serum</a></li>
        <li><a class="dropdown-item" href="#">Hair Oil</a></li>
        <li><a class="dropdown-item" href="#">Face Cream</a></li>
        <li><a class="dropdown-item" href="#">Lip Balm</a></li>

        </ul>

    </div>
    </div>

          <!-- Seller -->
          <div class="col-md-6">
            <label class="form-label">Seller</label>
            <select class="form-select">
              <option>Select Seller</option>
              <option>Rahim</option>
              <option>Kamal</option>
              <option>Admin</option>
            </select>
          </div>

          <!-- Total Amount -->
          <div class="col-md-6">
            <label class="form-label">Total Amount</label>
            <input type="number" class="form-control" placeholder="Enter total amount">
          </div>

          <!-- Sale Date -->
          <div class="col-md-6">
            <label class="form-label">Sale Date</label>
            <input type="date" class="form-control">
          </div>

          <!-- Payment Status -->
          <div class="col-md-6">
            <label class="form-label">Payment Status</label>
            <select class="form-select">
              <option>Select Status</option>
              <option>Paid</option>
              <option>Pending</option>
              <option>Cancelled</option>
            </select>
          </div>

          <!-- Notes -->
          <div class="col-12">
            <label class="form-label">Notes</label>
            <textarea class="form-control" rows="3" placeholder="Optional notes..."></textarea>
          </div>

        </div>

        <!-- Products Section (Static UI) -->
        <hr class="my-4">

        <h5 class="mb-3">Products</h5>

        <div class="table-responsive">

          <table class="table table-bordered align-middle">

            <thead class="table-light">
              <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
                <th></th>
              </tr>
            </thead>

            <tbody>

              <tr>
                <td>Glow Serum</td>
                <td>$25</td>
                <td>2</td>
                <td>$50</td>
                <td>
                  <button class="btn btn-sm btn-danger">
                    <i class="bi bi-trash"></i>
                  </button>
                </td>
              </tr>

              <tr>
                <td>Hair Oil</td>
                <td>$15</td>
                <td>1</td>
                <td>$15</td>
                <td>
                  <button class="btn btn-sm btn-danger">
                    <i class="bi bi-trash"></i>
                  </button>
                </td>
              </tr>

            </tbody>

          </table>

        </div>

        <!-- Total Summary -->
        <div class="d-flex justify-content-end mt-3">
          <div class="text-end">
            <h5>Total: $65</h5>
          </div>
        </div>

        <!-- Buttons -->
        <div class="mt-4 d-flex justify-content-end gap-2">

          <button type="button" class="btn btn-secondary">
            Cancel
          </button>

          <button type="submit" class="btn btn-primary">
            <i class="bi bi-check-circle me-1"></i> Save Sale
          </button>

        </div>

      </form>

    </div>
  </div>

</div>

@endsection