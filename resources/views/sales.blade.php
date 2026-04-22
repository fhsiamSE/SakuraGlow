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
          <h6 class="text-muted">Total Sales</h6>
          <h3 class="mb-0">Tk {{$totalAmount}}</h3>
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
              <th>Seller</th>
              <th>Amount</th>
              <th>Date</th>
              <th>Status</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>

          <tbody>

            <tr>
              @foreach ( $sales as $sale )
                
              <td>1</td>
              <td>{{ $sale->seller_name}}</td>
              <td>Tk {{ $sale->amount}}</td>
              <td>{{ $sale->date}}</td>
              <td><span class="badge bg-success">{{ $sale->status}}</span></td>
              <td class="text-end">
                <!-- View Details Button -->
                <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-sm btn-info">
                  <i class="bi bi-eye"></i> View Details
                </a>

                <!-- Update Button -->
                <button class="btn btn-sm btn-warning">
                  <i class="bi bi-pencil"></i> Update
                </button>

                <!-- Delete Button -->
                <button class="btn btn-sm btn-danger">
                  <i class="bi bi-trash"></i> Delete
                </button>
              </td>
            </tr>
            @endforeach


          </tbody>

        </table>

      </div>

    </div>
  </div>
<div class="mt-4 w-100 mx-auto justify-content-center">
  {{ $sales->links() }}
</div>
</div>

@endsection