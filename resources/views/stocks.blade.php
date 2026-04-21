@extends('layout')

@section('content')

<div class="container-fluid">

  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h3 class="mb-0">Stock</h3>
      <small class="text-muted">Manage and monitor product inventory</small>
    </div>

    <button class="btn btn-primary disabled">
      <i class="bi bi-plus-lg me-1"></i> Add Bulk Stock
    </button>
  </div>

  <!-- Summary Cards -->
  <div class="row g-3 mb-4">

    <div class="col-md-4">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <h6 class="text-muted">Total Products</h6>
          <h3 class="mb-0">120</h3>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <h6 class="text-muted">Low Stock</h6>
          <h3 class="text-warning mb-0">18</h3>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <h6 class="text-muted">Out of Stock</h6>
          <h3 class="text-danger mb-0">6</h3>
        </div>
      </div>
    </div>

  </div>

  <!-- Search -->
  <div class="card shadow-sm mb-3">
    <div class="card-body">
      <input type="text" class="form-control" placeholder="Search product...">
    </div>
  </div>

  <!-- Stock Table -->
  <div class="card shadow-sm">
    <div class="card-body p-0">

      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">

          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Product</th>
              <th>Category</th>
              <th>Stock</th>
              <th>Status</th>
              <th class="text-end">Action</th>
            </tr>
          </thead>

          <tbody>

            <tr>
              <td>1</td>
              <td>
                <div class="d-flex align-items-center">
                  <img src="https://via.placeholder.com/40" class="rounded me-2">
                  Glow Serum
                </div>
              </td>
              <td>Skincare</td>
              <td>120</td>
              <td><span class="badge bg-success">In Stock</span></td>
              <td class="text-end">
                <button class="btn btn-sm btn-primary">
                  <i class="bi bi-plus"></i>
                </button>
                 <button class="btn btn-sm btn-danger">
                  <i class="bi bi-dash"></i>
                </button>
              </td>
            </tr>

          </tbody>

        </table>
      </div>

    </div>
  </div>

</div>

@endsection