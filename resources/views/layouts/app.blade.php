<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('roles.index') }}"><i class="bi bi-person-badge"></i> Roles</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('permissions.index') }}"><i class="bi bi-shield-lock"></i> Permissions</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('accounts.index') }}"><i class="bi bi-journal-text"></i> Accounts</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('ledgers.index') }}"><i class="bi bi-book"></i> Ledgers</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('vouchers.index') }}"><i class="bi bi-receipt"></i> Vouchers</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('inventory-items.index') }}"><i class="bi bi-box-seam"></i> Inventory</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('purchase-management.suppliers.index') }}"><i class="bi bi-truck"></i> Suppliers</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('purchase-management.orders.index') }}"><i class="bi bi-cart"></i> Purchase Orders</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('purchase-management.invoices.index') }}"><i class="bi bi-file-earmark-text"></i> Purchase Invoices</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('customers.index') }}"><i class="bi bi-people"></i> Customers</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('sales-orders.index') }}"><i class="bi bi-bag"></i> Sales Orders</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('sales-invoices.index') }}"><i class="bi bi-receipt-cutoff"></i> Sales Invoices</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('production-batches.index') }}"><i class="bi bi-gear"></i> Production</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('bill-of-materials.index') }}"><i class="bi bi-list-check"></i> Bill of Materials</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('reports.index') }}"><i class="bi bi-bar-chart"></i> Reports</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('settings.index') }}"><i class="bi bi-sliders"></i> Settings</a></li>
                        </ul>
                    </div>
                </nav>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>
</html>
