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
          <h3 class="mb-0">{{$pendingorders}}</h3>
        </div>
      </div>
    </div>

  </div>

  <!-- Search & Filter -->
  <div class="card shadow-sm mb-3">
    <div class="card-body">

      <form method="GET" action="{{ route('sales.index') }}">
        <div class="row g-2">

          <div class="col-md-6">
            <input type="text" 
                   name="search" 
                   class="form-control" 
                   placeholder="Search by seller or product name..."
                   value="{{ request('search') }}">
          </div>

          <div class="col-md-3">
            <select name="status" class="form-select">
              <option value="">All Status</option>
              <option value="Paid" {{ request('status') == 'Paid' ? 'selected' : '' }}>Paid</option>
              <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
              <option value="Cancelled" {{ request('status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
          </div>

          <div class="col-md-3">
            <button type="submit" class="btn btn-outline-secondary w-100">
              <i class="bi bi-funnel me-1"></i> Filter
            </button>
          </div>

        </div>
      </form>

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
              <th>Product</th>
              <th>Amount</th>
              <th>Date</th>
              <th>Status</th>
              <th class="text-end">Actions</th>
            </tr>
          </thead>

          <tbody>

            @foreach ( $sales as $key => $sale )
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>{{ $sale->seller_name}}</td>
              <td>{{ $sale->product_name}}</td>
              <td>Tk {{ $sale->amount}}</td>
              <td>{{ $sale->date}}</td>
              <td><span class="badge bg-{{ $sale->status == 'Paid' ? 'success' : ($sale->status == 'Pending' ? 'warning' : 'danger') }}">
                {{ $sale->status }}
              </span></td>
              <td class="text-end">
                <!-- View Details Button -->
                <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-sm btn-info bg-primary">
                  <i class="bi bi-eye"></i> View Details
                </a>
              </td>
            </tr>
            @endforeach

            @if ($sales->count() == 0)
            <tr>
              <td colspan="6" class="text-center text-muted py-4">
                <i class="bi bi-inbox" style="font-size: 2rem;"></i>
                <p class="mt-2">No sales found. Try adjusting your filters.</p>
              </td>
            </tr>
            @endif

          </tbody>

        </table>

      </div>

    </div>
  </div>
<div class="mt-4 d-flex justify-content-between align-items-center">
  <div>
    @if (request('search') || request('status'))
    <a href="{{ route('sales.index') }}" class="btn btn-outline-secondary btn-sm">
      <i class="bi bi-arrow-clockwise me-1"></i> Clear Filters
    </a>
    @endif
  </div>
  <div>
    {{ $sales->links() }}
  </div>
</div>
</div>

@endsection