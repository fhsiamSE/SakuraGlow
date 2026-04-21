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

        /* 🔥 Active link style */
        .nav-pills .nav-link.active {
            background-color: #0d6efd;
            color: #fff !important;
        }

        /* Optional hover effect */
        .nav-link:hover {
            background-color: #1a1a1a;
        }
    </style>
</head>

<body>

<!-- ✅ TOP NAVBAR (Mobile Only) -->
<nav class="navbar navbar-dark bg-black d-md-none">
  <div class="container-fluid">
    <button class="btn btn-outline-light" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
      <i class="bi bi-list"></i>
    </button>
    <span class="text-white fw-bold">Sakura-Glow</span>
  </div>
</nav>

<!-- ✅ MAIN WRAPPER -->
<div class="d-flex vh-100 overflow-hidden">

  <!-- ✅ SIDEBAR -->
  <div class="offcanvas-md offcanvas-start bg-black text-white vh-100 sidebar"
       id="sidebarMenu"
       style="width: 280px;">

    <!-- Mobile header -->
    <div class="offcanvas-header d-md-none">
      <h5 class="offcanvas-title">Sakura-Glow</h5>
      <button class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>

    <!-- Sidebar content -->
    <div class="offcanvas-body d-flex flex-column p-3">

      <!-- Brand -->
      <span class="fs-4 text-white d-none d-md-block">Sakura-Glow</span>
      <hr>

      <!-- Menu -->
      <ul class="nav nav-pills flex-column gap-4 mb-auto">

        <li>
          <a href="{{ route('Dashboard') }}"
             class="nav-link text-white {{ request()->routeIs('Dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard
          </a>
        </li>

        <li>
          <a href="{{ route('products.index') }}"
             class="nav-link text-white {{ request()->routeIs('products.*') ? 'active' : '' }}">
            <i class="bi bi-box-seam me-2"></i> Products
          </a>
        </li>

        <li>
          <a href="{{ route('categories.index') }}"
             class="nav-link text-white {{ request()->routeIs('categories.*') ? 'active' : '' }}">
            <i class="bi bi-tags me-2"></i> Category
          </a>
        </li>

        <li>
          <a href="{{ route('sales.index') }}"
             class="nav-link text-white {{ request()->routeIs('sales.*') ? 'active' : '' }}">
            <i class="bi bi-cart-check me-2"></i> Sales
          </a>
        </li>

        <li>
          <a href="{{ route('transactions.index') }}"
             class="nav-link text-white {{ request()->routeIs('transactions.*') ? 'active' : '' }}">
            <i class="bi bi-receipt me-2"></i> Transactions
          </a>
        </li>

        <li>
          <a href="{{ route('stocks.index') }}"
             class="nav-link text-white {{ request()->routeIs('stocks.index') ? 'active' : '' }}">
            <i class="bi bi-archive me-2"></i> Stock
          </a>
        </li>

      </ul>

      <!-- Logout Footer -->
      <div class="mt-auto pt-3">
        <button class="btn btn-outline-light w-100">
          <i class="bi bi-box-arrow-right me-2"></i> Logout
        </button>
      </div>

    </div>
  </div>

  <!-- ✅ MAIN CONTENT (ONLY THIS SCROLLS) -->
  <div class="flex-grow-1 p-4 overflow-auto bg-light">

    @yield('content')

    <!-- Footer -->
    <footer class="text-center mt-5 mb-3 text-muted">
      &copy; {{ date('Y') }} Sakura-Glow. All rights reserved.
    </footer>

  </div>

</div>

</body>
</html>