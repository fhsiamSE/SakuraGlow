@extends('layout')

@section('content')

<div class="container-fluid">

  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h3 class="mb-0">Products</h3>
      <small class="text-muted">Manage your product inventory</small>
    </div>

    <a href="{{ route('products.create') }}" class="btn btn-primary">
      <i class="bi bi-plus-lg me-1"></i> Add Product
  </a>
  </div>

  <!-- Search & Filter -->
  <div class="card shadow-sm mb-3">
    <div class="card-body">

      <div class="row g-2">

        <div class="col-md-6">
          <input type="text" class="form-control" placeholder="Search products...">
        </div>

        <div class="col-md-3">
          <select class="form-select">
            <option>All Categories</option>
            <option>Skincare</option>
            <option>Makeup</option>
            <option>Hair Care</option>
          </select>
        </div>

        <div class="col-md-3">
          <button class="btn btn-outline-secondary w-100">
            <i class="bi bi-funnel me-1"></i> Filter
          </button>
        </div>

      </div>

    </div>
  </div>

  <!-- Products Table -->
  <div class="card shadow-sm">

    <div class="card-body p-0">

      <div class="table-responsive">

        <table class="table table-hover align-middle mb-0">

          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Product</th>
              <th>Category</th>
              <th>Price</th>
              <th>Stock</th>
              <th>Status</th>
              <th class="text-end">Actions</th>
            </tr>
          </thead>

          <tbody>

            <tr>
              <td>1</td>
              <td>
                <div class="d-flex align-items-center">
                  <img src="https://via.placeholder.com/45" class="rounded me-2">
                  Glow Serum
                </div>
              </td>
              <td>Skincare</td>
              <td>$25</td>
              <td>120</td>
              <td><span class="badge bg-success">In Stock</span></td>
              <td class="text-end">
                <button class="btn btn-sm btn-warning">
                  <i class="bi bi-pencil"></i>
                </button>
                <button class="btn btn-sm btn-danger">
                  <i class="bi bi-trash"></i>
                </button>
              </td>
            </tr>

            <tr>
              <td>2</td>
              <td>
                <div class="d-flex align-items-center">
                  <img src="https://via.placeholder.com/45" class="rounded me-2">
                  Hair Oil
                </div>
              </td>
              <td>Hair Care</td>
              <td>$15</td>
              <td>45</td>
              <td><span class="badge bg-warning text-dark">Low Stock</span></td>
              <td class="text-end">
                <button class="btn btn-sm btn-warning">
                  <i class="bi bi-pencil"></i>
                </button>
                <button class="btn btn-sm btn-danger">
                  <i class="bi bi-trash"></i>
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