@extends('layout')

@section('content')

<div class="container-fluid">

  <!-- Header -->
  <div class="mb-4">
    <h3 class="mb-0">Update Product</h3>
    <small class="text-muted">Edit product details and update information</small>
  </div>

  <!-- Form Card -->
  <div class="card shadow-sm">
    <div class="card-body">

      <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-3">

          <!-- Product Name -->
          <div class="col-md-6">
            <label class="form-label">Product Name</label>
            <input type="text"
                   name="product_name"
                   class="form-control"
                   value="{{ old('product_name', $product->product_name) }}"
                   required>
          </div>

          <!-- Category -->
          <div class="col-md-6">
            <label class="form-label">Category</label>
            <select name="category" class="form-select" required>
              <option value="">Select Category</option>
              <option value="Skincare" {{ $product->category == 'Skincare' ? 'selected' : '' }}>Skincare</option>
              <option value="Makeup" {{ $product->category == 'Makeup' ? 'selected' : '' }}>Makeup</option>
              <option value="Hair Care" {{ $product->category == 'Hair Care' ? 'selected' : '' }}>Hair Care</option>
            </select>
          </div>

          <!-- Price -->
          <div class="col-md-6">
            <label class="form-label">Price</label>
            <input type="number"
                   name="price"
                   class="form-control"
                   value="{{ old('price', $product->price) }}"
                   required>
          </div>

          <!-- Description -->
          <div class="col-12">
            <label class="form-label">Description</label>
            <textarea name="description"
                      class="form-control"
                      rows="4"
                      required>{{ old('description', $product->description) }}</textarea>
          </div>

          <!-- Current Image -->
          <div class="col-12">
            <label class="form-label">Current Image</label><br>
            <img src="{{ asset('storage/' . $product->image) }}"
                 class="img-thumbnail"
                 style="max-height: 150px;">
          </div>

          <!-- New Image -->
          <div class="col-12">
            <label class="form-label">Change Image (optional)</label>
            <input type="file" name="image" class="form-control">
          </div>

        </div>

        <!-- Buttons -->
        <div class="mt-4 d-flex justify-content-end gap-2">

          <a href="{{ route('products.index') }}" class="btn btn-secondary">
            Cancel
          </a>

          <button type="submit" class="btn btn-primary">
            <i class="bi bi-arrow-repeat me-1"></i> Update Product
          </button>

        </div>

      </form>

    </div>
  </div>

</div>

@endsection