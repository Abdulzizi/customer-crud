@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true"
            data-bs-delay="5000" style="position: fixed; top: 1rem; right: 1rem;">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <h3 class="mb-4 text-center text-primary">Customers</h3>
            <div class="card shadow-sm">
                <div class="card-header bg-light border-0">
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            <a href="{{ route('customers.create') }}" class="btn btn-primary d-flex align-items-center">
                                <i class="fas fa-plus me-2"></i> Create Customer
                            </a>
                        </div>
                        <div class="col-md-6">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search customers...">
                                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select">
                                <option selected>Newest to Oldest</option>
                                <option>Oldest to Newest</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover text-center">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Date of Birth</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Email</th>
                                <th scope="col">BAN</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>John</td>
                                <td>Doe</td>
                                <td>7-7-2000</td>
                                <td>881-6929-0200</td>
                                <td>john@gmail.com</td>
                                <td>1902982829282</td>
                                <td>
                                    <a href="#" class="text-info me-2"><i class="far fa-edit"></i></a>
                                    <a href="/customer-details.html" class="text-primary me-2"><i
                                            class="far fa-eye"></i></a>
                                    <a href="#" class="text-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <!-- Additional rows go here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Card and Table Styling */
        .card {
            border: none;
            border-radius: 8px;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f8f9fa;
        }

        .table-hover tbody tr:hover {
            background-color: #e9ecef;
        }

        /* Action Icon Styling */
        .table td a {
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }

        .table td a:hover {
            color: #007bff !important;
        }

        /* Custom Button Styles */
        .btn-primary {
            background-color: #4a4ff7;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #3c3dce;
        }

        .btn-outline-secondary {
            border-color: #6c757d;
            color: #6c757d;
        }

        .btn-outline-secondary:hover {
            background-color: #6c757d;
            color: white;
        }

        /* Select Styling */
        .form-select {
            border-radius: 4px;
            padding: 0.375rem 1rem;
        }
    </style>
@endsection
