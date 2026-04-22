@extends('layout')

@section('content')
    <div class="container-fluid">

  <h3 class="mb-4">Dashboard</h3>

  <div class="row g-4">

    <!-- Card 1 -->
  <div class="col-md-3">
      <div class="card shadow-sm border-0">
        <div class="card-body d-flex align-items-center">
          <div class="me-3">
            <i class="bi bi-box-seam fs-1 text-warning"></i>
          </div>
          <div>
            <h6 class="mb-0">Products</h6>
            <h4 class="fw-bold">{{$totalProducts}}</h4>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col-md-3">
      <div class="card shadow-sm border-0">
        <div class="card-body d-flex align-items-center">
          <div class="me-3">
           <i class="bi bi-tags fs-1 text-danger"></i>
          </div>
          <div>
            <h6 class="mb-0">Categories</h6>
            <h4 class="fw-bold">{{$totalCategoris}}</h4>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 3 -->
   <div class="col-md-3">
      <div class="card shadow-sm border-0">
        <div class="card-body d-flex align-items-center">
          <div class="me-3">
            <i class="bi bi-cart-check fs-1 text-success"></i>
          </div>
          <div>
            <h6 class="mb-0">Sales</h6>
            <h4 class="fw-bold">320</h4>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 4 -->
    <div class="col-md-3">
      <div class="card shadow-sm border-0">
        <div class="card-body d-flex align-items-center">
          <div class="me-3">
            <i class="bi bi-cash-coin fs-1 text-primary"></i>
          </div>
          <div>
            <h6 class="mb-0">Revenue</h6>
            <h4 class="fw-bold">$9,540</h4>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>



<div class="card shadow-sm border-0 mt-4">
  <div class="card-body">
    <h5 class="mb-3">Sales Overview</h5>
    <canvas id="salesChart"></canvas>
  </div>
</div>


<script>
const ctx = document.getElementById('salesChart');

new Chart(ctx, {
  type: 'line', 
  data: {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
    datasets: [{
      label: 'Sales (৳)',
      data: [1200, 1900, 3000, 2500, 4000, 3500, 5000],
      borderColor: '#198754',
      backgroundColor: 'rgba(25, 135, 84, 0.1)',
      tension: 0.4,
      fill: true,
      pointBackgroundColor: '#198754',
    }]
  },
  options: {
    responsive: true,
    plugins: {
      legend: {
        display: true
      }
    },
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
</script>
@endsection