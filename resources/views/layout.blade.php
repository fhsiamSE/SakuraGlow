<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .sidebar {
            border-right: 1px solid #222;
        }
    </style>
</head>

<body class="bg-light">

<!-- ✅ Top Navbar (Mobile Only) -->
<nav class="navbar navbar-dark bg-black d-md-none">
  <div class="container-fluid">
    <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
      <i class="bi bi-list"></i>
    </button>

    <span class="text-white fw-bold">Sakura-Glow</span>
  </div>
</nav>

<div class="d-flex">

  <!-- ✅ Sidebar (Offcanvas on mobile, fixed on desktop) -->
  <div class="offcanvas-md offcanvas-start bg-black text-white sidebar"
       tabindex="-1"
       id="sidebarMenu"
       style="width: 280px; min-height: 100vh;">

    <!-- Mobile Header inside sidebar -->
    <div class="offcanvas-header d-md-none">
      <h5 class="offcanvas-title">Sakura-Glow</h5>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body d-flex flex-column p-3">

      <!-- Brand (desktop only) -->
      <span class="fs-4 text-white d-none d-md-block">Sakura-Glow</span>
      <hr>

      <!-- Menu -->
      <ul class="nav nav-pills gap-3 flex-column mb-auto" id="menu">

        <li class="nav-item">
          <a href="{{ route('Dashboard') }}"
             class="nav-link text-white {{ request()->routeIs('Dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard
          </a>
        </li>

        <li>
          <a href="{{ route('products.index') }}"
             class="nav-link text-white {{ request()->routeIs('products.index') ? 'active' : '' }}">
            <i class="bi bi-box-seam me-2"></i> Products
          </a>
        </li>

        <li>
          <a href="{{ route('sales.index') }}"
             class="nav-link text-white {{ request()->routeIs('sales.index') ? 'active' : '' }}">
            <i class="bi bi-cart-check me-2"></i> Sales
          </a>
        </li>

        <li>
          <a href="{{ route('transactions.index') }}"
             class="nav-link text-white {{ request()->routeIs('transactions.index') ? 'active' : '' }}">
            <i class="bi bi-receipt me-2"></i> Transactions
          </a>
        </li>

        <li>
          <a href="{{ route('Stock') }}"
             class="nav-link text-white {{ request()->routeIs('Stock') ? 'active' : '' }}">
            <i class="bi bi-archive me-2"></i> Stock
          </a>
        </li>

        <li>
          <a href="{{ route('Stock') }}"
             class="nav-link text-white {{ request()->routeIs('Stock') ? 'active' : '' }}">
            <i class="bi bi-archive me-2"></i> Stock
          </a>
        </li>

        <li>
          <a href="{{ route('Stock') }}"
             class="nav-link text-white {{ request()->routeIs('Stock') ? 'active' : '' }}">
            <i class="bi bi-archive me-2"></i> Stock
          </a>
        </li>

      </ul>
      <div class="mt-auto pt-5">
    <button class="btn btn-outline-light w-100" type="button">
      <i class="bi bi-box-arrow-right me-2"></i> Logout
    </button>

  </div>
    </div>
  </div>

  <!-- ✅ Main Content -->
  <div class="flex-grow-1 p-4">
    @yield('content')
  </div>

</div>
</body>
</html>