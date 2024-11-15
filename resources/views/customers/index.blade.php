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
                        <div class="col-12 col-md-3 mb-3 mb-md-0">
                            <a href="{{ route('customers.create') }}"
                                class="btn btn-primary w-100 d-flex align-items-center justify-content-center">
                                <i class="fas fa-plus me-2"></i> Create Customer
                            </a>
                        </div>
                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                            <form action="{{ route('home') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search"
                                        value="{{ request('search') }}" placeholder="Search customers...">
                                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 col-md-3">
                            <form action="{{ route('home') }}" method="GET">
                                <select class="form-select" name="sort_by" onchange="this.form.submit()">
                                    <option value="oldest" {{ request('sort_by') == 'oldest' ? 'selected' : '' }}>Oldest to
                                        Newest</option>
                                    <option value="newest" {{ request('sort_by') == 'newest' ? 'selected' : '' }}>Newest to
                                        Oldest</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover text-center d-none d-md-table">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Bank Number</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <th scope="row">{{ $customer->id }}</th>
                                        <td>{{ $customer->firstName }}</td>
                                        <td>{{ $customer->lastName }}</td>
                                        <td>{{ $customer->phoneNumber }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->bankNumber }}</td>
                                        <td>
                                            <a href="{{ route('customers.edit', $customer->id) }}" class="text-info me-2">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="/customer-details.html" class="text-primary me-2">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a href="#" class="text-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Mobile View -->
                        <div class="d-md-none">
                            @foreach ($customers as $customer)
                                <div class="card mb-3 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary">#{{ $customer->id }} -
                                            {{ $customer->firstName }} {{ $customer->lastName }}</h5>
                                        <p class="mb-1"><strong>Phone:</strong> {{ $customer->phoneNumber }}</p>
                                        <p class="mb-1"><strong>Email:</strong> {{ $customer->email }}</p>
                                        <p class="mb-1"><strong>Bank Number:</strong> {{ $customer->bankNumber }}</p>
                                        <div class="d-flex justify-content-end mt-2">
                                            <a href="{{ route('customers.edit', $customer->id) }}"
                                                class="btn btn-outline-info btn-sm me-2">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="/customer-details.html" class="btn btn-outline-primary btn-sm me-2">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a href="#" class="btn btn-outline-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
