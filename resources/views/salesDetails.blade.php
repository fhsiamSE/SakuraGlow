@extends('layout')

@section('content')
  <div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h3 class="mb-0">Sale Details</h3>
        <small class="text-muted">View sale transaction details</small>
      </div>

      <a href="{{ route('sales.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back to Sales
      </a>
    </div>

    <!-- Sale Details Card -->
    <div class="card shadow-sm">
      <div class="card-body">

        <dl class="row">
          <dt class="col-sm-3">Product Name</dt>
          <dd class="col-sm-9">{{ $sales->product_name }}</dd>

          <dt class="col-sm-3">Seller Name</dt>
          <dd class="col-sm-9">{{ $sales->seller_name }}</dd>

          <dt class="col-sm-3">Amount</dt>
          <dd class="col-sm-9">Tk {{ $sales->amount }}</dd>

          <dt class="col-sm-3">Status</dt>
          <dd class="col-sm-9">
            <span class="badge bg-{{ $sales->status == 'Paid' ? 'success' : ($sales->status == 'Pending' ? 'warning' : 'danger') }}">
              {{ $sales->status }}
            </span>
          </dd>

          <dt class="col-sm-3">Quantity</dt>
          <dd class="col-sm-9">{{ $sales->quantity }}</dd>

          <dt class="col-sm-3">Note</dt>
          <dd class="col-sm-9">{{ $sales->note ?? 'No notes available' }}</dd>

          <dt class="col-sm-3">Date</dt>
          <dd class="col-sm-9">{{ \Carbon\Carbon::parse($sales->date)->format('d M Y') }}</dd>
        </dl>

        <div class="text-end">
          <a href="{{ route('sales.edit', $sales->id) }}" class="btn btn-primary">
            <i class="bi bi-pencil me-1"></i> Edit Sale
          </a>
          <form action="{{ route('sales.destroy', $sales->id) }}" method="POST" class="d-inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
              <i class="bi bi-trash me-1"></i> Delete Sale
            </button>
          </form>
        </div>

      </div>
    </div>

  </div>
@endsection