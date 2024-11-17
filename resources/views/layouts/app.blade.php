<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Customers')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">

    <!-- Custom Styles -->
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            overflow-x: hidden;
            /* Prevent horizontal scrolling */
        }

        .container,
        .row {
            max-width: 100%;
            padding-left: 0;
            padding-right: 0;
        }

        table,
        img {
            max-width: 100%;
            height: auto;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #0069d9;
        }

        .navbar .navbar-brand {
            color: #f8f9fa;
            font-size: 1.25rem;
        }

        .navbar .nav-link {
            color: #dcdcdc;
            font-size: 1rem;
            padding: 0.5rem 1rem;
            transition: color 0.3s ease, background-color 0.3s ease;
        }

        .navbar .nav-link:hover {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Toast Styling */
        .toast-container {
            position: fixed;
            bottom: 0;
            right: 0;
            z-index: 1050;
            padding: 10px;
            max-width: 100%;
        }

        /* Utility Classes */
        .fw-semibold {
            font-weight: 600;
        }

        .fs-4 {
            font-size: 1.25rem;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand fw-semibold fs-4" href="{{ route('home') }}">
                <i class="fas fa-users me-2"></i>Customer Management
            </a>
            <!-- Mobile View Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link fw-semibold text-light" href="{{ route('home') }}" aria-current="page">
                            <i class="fas fa-home me-1"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold text-light" href="{{ route('customers.create') }}">
                            <i class="fas fa-user-plus me-1"></i>Create Customer
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mt-4">
        @yield('content')
    </main>

    <!-- Toasts -->
    <div class="toast-container">
        @foreach (['successCreate', 'successUpdate'] as $toast)
            @if (session($toast))
                <div class="toast-container position-fixed bottom-0 end-0 p-3">
                    <div class="toast show shadow-lg" role="alert" aria-live="assertive" aria-atomic="true"
                        style="max-width: 350px; z-index: 1050;">
                        <div class="toast-header bg-primary text-white rounded-top">
                            <strong class="me-auto"><i class="fas fa-check-circle me-2"></i>Success</strong>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            <p class="mb-0">{{ session($toast) }}</p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/fontawesome.js') }}"></script>

</body>

</html>
