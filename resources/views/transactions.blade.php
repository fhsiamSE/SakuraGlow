@extends('layout')

@section('content')

<div class="container-fluid">

  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h3 class="mb-0">Transactions</h3>
      <small class="text-muted">Track product stock movements (IN / OUT / ADJUSTMENT)</small>
    </div>
     <a href="{{ route('transactions.create') }}" class="btn btn-primary">
    <i class="bi bi-plus-lg me-1"></i> Add Transaction
  </a>
  </div>
  

  <!-- Summary Cards -->
  <div class="row g-3 mb-4">

    <div class="col-md-4">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <h6 class="text-muted">Stock In</h6>
          <h3 class="text-success mb-0">+320</h3>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <h6 class="text-muted">Stock Out</h6>
          <h3 class="text-danger mb-0">-180</h3>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <h6 class="text-muted">Adjustments</h6>
          <h3 class="text-warning mb-0">+12</h3>
        </div>
      </div>
    </div>

  </div>

  <!-- Filters -->
  <div class="card shadow-sm mb-3">
    <div class="card-body">

      <div class="row g-2">

        <div class="col-md-5">
          <input type="text" class="form-control" placeholder="Search product or seller...">
        </div>

        <div class="col-md-3">
          <select class="form-select">
            <option>All Types</option>
            <option>In</option>
            <option>Out</option>
            <option>Adjustment</option>
          </select>
        </div>

        <div class="col-md-4">
          <button class="btn btn-outline-secondary w-100">
            <i class="bi bi-funnel me-1"></i> Filter
          </button>
        </div>

      </div>

    </div>
  </div>

  <!-- Table -->
  <div class="card shadow-sm">

    <div class="card-body p-0">

      <div class="table-responsive">

        <table class="table table-hover align-middle mb-0">

          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Product</th>
              <th>Seller</th>
              <th>Quantity</th>
              <th>Type</th>
              <th>Date</th>
            </tr>
          </thead>

          <tbody>

            <tr>
              <td>1</td>
              <td>Glow Serum</td>
              <td>Admin</td>
              <td>+50</td>
              <td><span class="badge bg-success">IN</span></td>
              <td>2026-04-20</td>
            </tr>

            <tr>
              <td>2</td>
              <td>Hair Oil</td>
              <td>Rahim</td>
              <td>-20</td>
              <td><span class="badge bg-danger">OUT</span></td>
              <td>2026-04-19</td>
            </tr>

            <tr>
              <td>3</td>
              <td>Face Cream</td>
              <td>System</td>
              <td>+5</td>
              <td><span class="badge bg-warning text-dark">ADJUST</span></td>
              <td>2026-04-18</td>
            </tr>

          </tbody>

        </table>

      </div>

    </div>
  </div>

</div>

@endsection