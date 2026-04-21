@extends('layout')

@section('content')

@php
  $totalProducts = count($stockData);
  $lowStock = 0;
  $outOfStock = 0;

  foreach ($stockData as $data) {
      if ($data['stock'] <= 0) {
          $outOfStock++;
      } elseif ($data['stock'] < 5) {
          $lowStock++;
      }
  }
@endphp

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

    <!-- Total Products -->
    <div class="col-md-4">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <h6 class="text-muted">Total Products</h6>
          <h3 class="mb-0">{{ $totalProducts }}</h3>
        </div>
      </div>
    </div>

    <!-- Low Stock -->
    <div class="col-md-4">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <h6 class="text-muted">Low Stock</h6>
          <h3 class="text-warning mb-0">{{ $lowStock }}</h3>
        </div>
      </div>
    </div>

    <!-- Out of Stock -->
    <div class="col-md-4">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <h6 class="text-muted">Out of Stock</h6>
          <h3 class="text-danger mb-0">{{ $outOfStock }}</h3>
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
            </tr>
          </thead>

          <tbody>
            @foreach ($stockData as $index => $data)

              @php
                $stock = $data['stock'];
              @endphp

              <tr>
                <td>{{ $index + 1 }}</td>

                <td>
                  <div class="d-flex align-items-center gap-2" style="font-size: 13px;">
                    <img src="{{ Storage::url($data['product_img']) }}" class="rounded" width="30" alt="">
                    <span class="text-truncate">{{ $data['product'] }}</span>
                  </div>
                </td>

                <td>Skincare</td>

                <td>{{ $stock }}</td>

                <td>
                  @if ($stock <= 0)
                    <span class="badge bg-danger">Out of Stock</span>
                  @elseif ($stock < 5)
                    <span class="badge bg-warning text-dark">Low Stock</span>
                  @else
                    <span class="badge bg-success">In Stock</span>
                  @endif
                </td>

              </tr>

            @endforeach
          </tbody>

        </table>
      </div>

    </div>
  </div>

  <!-- Pagination -->
  <div class="mt-4 w-100 mx-auto justify-content-center">
    {{ $products->links() }}
  </div>

</div>

@endsection