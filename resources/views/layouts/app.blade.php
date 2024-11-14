<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Customers')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
</head>

<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Customer Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('customers.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customers.create') }}">Create Customer</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <style>
        /* Header Styling */
        .navbar {
            background-color: #343a40;
            /* Dark gray */
        }

        .navbar .navbar-brand {
            color: #f8f9fa;
            /* Light color for brand */
            font-size: 1.25rem;
        }

        .navbar .nav-link {
            color: #dcdcdc;
            /* Light gray text for links */
            font-size: 1rem;
            padding: 0.5rem 1rem;
            transition: color 0.3s ease;
        }

        .navbar .nav-link:hover {
            color: #ffffff;
            /* Brighter color on hover */
        }
    </style>

    <!-- Main Content -->
    @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/fontawesome.js') }}"></script>

</body>

</html>
