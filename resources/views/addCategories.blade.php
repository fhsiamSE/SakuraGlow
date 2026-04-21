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

      <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-3">

          <!-- Category Name -->
         <div class="card shadow-sm border-0">
         <div class="card-body">
            <div class="mb-3">
            <label class="form-label fw-semibold">Category Name</label>
            <input 
                type="text" 
                name="category_name" 
                class="form-control" 
                placeholder="Enter category name" 
                required
            >
            </div>

            <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary px-4">
                Add Category
            </button>
            </div>
          </div>
        </div>


      </form>

    </div>
  </div>

</div>

@endsection