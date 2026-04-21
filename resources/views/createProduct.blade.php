@extends('layout')

@section('content')

<div class="container-fluid">

  <!-- Header -->
  <div class="mb-4">
    <h3 class="mb-0">Add Product</h3>
    <small class="text-muted">Create a new product with category and details</small>
  </div>

  <!-- Form Card -->
  <div class="card shadow-sm">
    <div class="card-body">

      <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-3">

          <!-- Product Name -->
          <div class="col-md-6">
            <label class="form-label">Product Name</label>
            <input type="text" name="product_name" class="form-control" placeholder="Enter product name" required>
          </div>

          <!-- Category -->
          <div class="col-md-6">
            <label class="form-label">Category</label>
            <select name="category" class="form-select" required>
              <option value="">Select Category</option>
              @foreach ($categories as $categorie)
                
              @endforeach
              <option value="{{ $categorie->categories }}">{{$categorie->categories}}</option>

            </select>
          </div>

          <!-- Price -->
          <div class="col-md-6">
            <label class="form-label">Price</label>
            <input type="number" name="price" class="form-control" placeholder="Enter price"required>
          </div>


          <!-- Description -->
          <div class="col-12">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" placeholder="Product description..." required></textarea>
          </div>

          <!-- Image -->
          <div class="col-12">
            <label class="form-label ">Product Image</label>
            <input type="file" name="image" class="form-control " required>
          </div>

        </div>

        <!-- Buttons -->
        <div class="mt-4 d-flex justify-content-end gap-2">

          <a href="" class="btn btn-secondary">
            Cancel
          </a>

          <button type="submit" class="btn btn-primary">
            <i class="bi bi-save me-1"></i> Save Product
          </button>

        </div>

      </form>

    </div>
  </div>

</div>

@endsection