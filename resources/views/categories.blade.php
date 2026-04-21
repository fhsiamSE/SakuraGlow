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
      <h3 class="mb-0">Categories</h3>
      <small class="text-muted">Manage your product categories</small>
    </div>

    <a href="" class="btn btn-primary">
      <i class="bi bi-plus-lg me-1"></i> Add Category
    </a>
  </div>

  <!-- Search (optional) -->
  <div class="card shadow-sm mb-3">
    <div class="card-body">
      <div class="row g-2">
        <div class="col-md-9">
          <input type="text" class="form-control" placeholder="Search categories...">
        </div>
        <div class="col-md-3">
          <button class="btn btn-outline-secondary w-100">
            <i class="bi bi-search me-1"></i> Search
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Categories Table -->
  <div class="card shadow-sm">
    <div class="card-body p-0">
      <div class="table-responsive">

        <table class="table table-hover align-middle mb-0">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Category Name</th>
              <th>Description</th>
              <th class="text-end">Actions</th>
            </tr>
          </thead>

         <tbody>

          <tr>
            <td>1</td>
            <td>Skincare</td>
            <td>Products for skin health and beauty</td>
            <td class="text-end">
              <button class="btn btn-sm btn-warning">
                <i class="bi bi-pencil"></i>
              </button>
              <button class="btn btn-sm btn-danger">
                <i class="bi bi-trash"></i>
              </button>
            </td>
          </tr>

          <tr>
            <td>2</td>
            <td>Makeup</td>
            <td>Cosmetic products for face and body</td>
            <td class="text-end">
              <button class="btn btn-sm btn-warning">
                <i class="bi bi-pencil"></i>
              </button>
              <button class="btn btn-sm btn-danger">
                <i class="bi bi-trash"></i>
              </button>
            </td>
          </tr>

        <tr>
          <td>3</td>
          <td>Hair Care</td>
          <td>Shampoo, conditioner, and styling products</td>
          <td class="text-end">
            <button class="btn btn-sm btn-warning">
              <i class="bi bi-pencil"></i>
            </button>
            <button class="btn btn-sm btn-danger">
              <i class="bi bi-trash"></i>
            </button>
          </td>
        </tr>

        <tr>
          <td>4</td>
          <td>Fragrance</td>
          <td>Perfumes and body sprays</td>
          <td class="text-end">
            <button class="btn btn-sm btn-warning">
              <i class="bi bi-pencil"></i>
            </button>
            <button class="btn btn-sm btn-danger">
              <i class="bi bi-trash"></i>
            </button>
          </td>
        </tr>

</tbody>

        </table>

      </div>
    </div>
  </div>


</div>
@endsection