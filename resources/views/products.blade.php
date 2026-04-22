@extends('layout')

@section('content')
<div class="container-fluid">

{{-- Success message --}}
<x-alert/>

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
<form method="GET" action="{{ route('products.index') }}">
    <div class="card shadow-sm mb-3">
        <div class="card-body">

            <div class="row g-2">

                <!-- Search -->
                <div class="col-md-6">
                    <input 
                        type="text" 
                        name="search"
                        class="form-control" 
                        placeholder="Search products..."
                        value="{{ request('search') }}"
                    >
                </div>

                <!-- Category -->
                <div class="col-md-3">
                    <select name="category" class="form-select">
                        <option value="">All Categories</option>
                         @foreach ($categories as $categorie)
                          <option value="Skincare" {{ request('category') == '$categorie->categories' ? 'selected' : '' }}>
                            {{$categorie->categories}}
                          </option>
                         @endforeach
                    </select>
                </div>

                <!-- Buttons -->
                <div class="col-md-3 d-flex gap-2">

                    <button class="btn btn-outline-secondary w-100">
                        <i class="bi bi-funnel me-1"></i> Filter
                    </button>

                    <a href="{{ route('products.index') }}" class="btn btn-light w-100">
                        Reset
                    </a>

                </div>

            </div>

        </div>
    </div>
</form>

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
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration + ($products->perPage() * ($products->currentPage() - 1)) }}</td>

                        <td>
                            <div class="d-flex align-items-center text-truncate gap-2" style=" font-size: 10px;">
                                <img src="{{ Storage::url($product->image) }}"  class="rounded me-2" width="25" alt="{{ $product->product_name }}">
                                {{ $product->product_name }}
                            </div>
                        </td>

                        <td>{{ $product->category }}</td>
                        <td>TK {{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>

                        <td class="text-end">

                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                No products found
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>

    </div>
</div>

<!-- Pagination -->
<div class="mt-4  w-100 mx-auto justify-content-center">
    {{ $products->links() }}
</div>

</div>
@endsection