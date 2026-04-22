@extends('layout')

@section('content')

<div class="container-fluid">
 {{-- Success message --}}
 <x-alert/>
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

      <form method="GET" action="{{ route('transactions.index') }}">
        <div class="row g-2">

          <div class="col-md-5">
            <input type="text" 
                   name="search" 
                   class="form-control" 
                   placeholder="Search product or seller..."
                   value="{{ request('search') }}">
          </div>

          <div class="col-md-3">
            <select name="type" class="form-select">
              <option value="">All Types</option>
              <option value="in" {{ request('type') == 'in' ? 'selected' : '' }}>In</option>
              <option value="out" {{ request('type') == 'out' ? 'selected' : '' }}>Out</option>
              <option value="adjustment" {{ request('type') == 'adjustment' ? 'selected' : '' }}>Adjustment</option>
            </select>
          </div>

          <div class="col-md-4">
            <button type="submit" class="btn btn-outline-secondary w-100">
              <i class="bi bi-funnel me-1"></i> Filter
            </button>
          </div>

        </div>
      </form>

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
              <td>{{ $loop->iteration + ($transactions->perPage() * ($transactions->currentPage() - 1)) }}</td>
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

            @if ($transactions->count() == 0)
            <tr>
              <td colspan="6" class="text-center text-muted py-4">
                <i class="bi bi-inbox" style="font-size: 2rem;"></i>
                <p class="mt-2">No transactions found. Try adjusting your filters.</p>
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
    @if (request('search') || request('type'))
    <a href="{{ route('transactions.index') }}" class="btn btn-outline-secondary btn-sm">
      <i class="bi bi-arrow-clockwise me-1"></i> Clear Filters
    </a>
    @endif
  </div>
  <div>
    {{ $transactions->links() }}
  </div>
</div>
</div>

@endsection