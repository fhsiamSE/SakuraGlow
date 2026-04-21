@extends('layout')

@section('content')

<div class="container-fluid">
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
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
          <h3 class="text-success mb-0">+{{$totalIn}}</h3>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <h6 class="text-muted">Stock Outstand</h6>
          <h3 class="text-danger mb-0">-{{$totalOut}}</h3>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <h6 class="text-muted">Adjustments</h6>
          <h3 class="text-warning mb-0">+{{$totalAdjusts}}</h3>
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
            @foreach ($transactions as $transaction)
               <tr>
              <td>{{ $loop->iteration }}</td>
              <td>
                
                <div class="d-flex align-items-center text-truncate gap-2" style=" font-size: 10px;">
                  <img src="{{ Storage::url($transaction->product->image) }}" class="rounded me-2" width="25" alt="{{ $transaction->product->product_name }}">
                  {{$transaction->product->product_name }}
                </div>
              </td>
              <td>{{$transaction->seller->name}}</td>
              <td>{{$transaction->quantity}}</td>
              <td>
              <span 
              class="badge {{ $transaction->transaction_type == 'in' ? 'bg-success' : '' }}
                          {{ $transaction->transaction_type == 'out' ? 'bg-danger' : '' }}
                          {{ $transaction->transaction_type == 'adjustment' ? 'bg-warning' : '' }}">

                {{ $transaction->transaction_type }}
              </span>
              </td>
              <td>{{$transaction->created_at}}</td>
            </tr>
            @endforeach

          </tbody>

        </table>

      </div>
    </div>
  </div>
<div class="mt-4 w-100 mx-auto justify-content-center">
  {{ $transactions->links() }}
</div>
</div>

@endsection