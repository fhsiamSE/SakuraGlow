@extends('layout')

@section('content')

<div class="container-fluid">

  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h3 class="mb-0">Sales</h3>
      <small class="text-muted">Track all sales transactions</small>
    </div>

    <a href="{{ route('sales.create') }}" class="btn btn-primary">
      <i class="bi bi-plus-lg me-1"></i> New Sale
    </a>
  </div>

  <!-- Summary Cards -->
  <div class="row g-3 mb-4">

    <div class="col-md-4">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <h6 class="text-muted">Today Sales</h6>
          <h3 class="mb-0">$1,250</h3>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <h6 class="text-muted">Total Sales</h6>
          <h3 class="mb-0">$24,580</h3>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <h6 class="text-muted">Pending Orders</h6>
          <h3 class="mb-0">18</h3>
        </div>
      </div>
    </div>

  </div>

  <!-- Search & Filter -->
  <div class="card shadow-sm mb-3">
    <div class="card-body">

      <div class="row g-2">

        <div class="col-md-6">
          <input type="text" class="form-control" placeholder="Search sales...">
        </div>

        <div class="col-md-3">
          <select class="form-select">
            <option>All Status</option>
            <option>Completed</option>
            <option>Pending</option>
            <option>Cancelled</option>
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

  <!-- Sales Table -->
  <div class="card shadow-sm">

    <div class="card-body p-0">

      <div class="table-responsive">

        <table class="table table-hover align-middle mb-0">

          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Customer</th>
              <th>Product</th>
              <th>Date</th>
              <th>Amount</th>
              <th>Status</th>
              <th class="text-end">Actions</th>
            </tr>
          </thead>

          <tbody>

            <tr>
              <td>1</td>
              <td>Rahim</td>
              <td>Glow Serum</td>
              <td>2026-04-20</td>
              <td>$25</td>
              <td><span class="badge bg-success">Completed</span></td>
              <td class="text-end">
                <button class="btn btn-sm btn-info">
                  <i class="bi bi-eye"></i>
                </button>
              </td>
            </tr>

            <tr>
              <td>2</td>
              <td>Kamal</td>
              <td>Hair Oil</td>
              <td>2026-04-19</td>
              <td>$15</td>
              <td><span class="badge bg-warning text-dark">Pending</span></td>
              <td class="text-end">
                <button class="btn btn-sm btn-info">
                  <i class="bi bi-eye"></i>
                </button>
                <button class="btn btn-sm btn-success">
                  <i class="bi bi-check"></i>
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