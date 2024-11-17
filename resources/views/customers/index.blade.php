@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <h3 class="mb-4 text-center text-primary">Customers</h3>
            <div class="card shadow-sm">
                <div class="card-header bg-light border-0">
                    <div class="row align-items-center">
                        <!-- Create Customer Button -->
                        <div class="col-12 col-md-3 mb-3 mb-md-0">
                            <a href="{{ route('customers.create') }}"
                                class="btn btn-primary w-100 d-flex align-items-center justify-content-center">
                                <i class="fas fa-plus me-2"></i> Create Customer
                            </a>
                        </div>

                        <!-- Search Input -->
                        <div class="col-12 col-md-5 mb-3 mb-md-0">
                            <form action="{{ route('home') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search"
                                        value="{{ request('search') }}" placeholder="Search customers...">
                                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                                </div>
                            </form>
                        </div>

                        <!-- Sort By Dropdown -->
                        <div class="col-6 col-md-2 mb-3 mb-md-0">
                            <form action="{{ route('home') }}" method="GET">
                                <select class="form-select" name="sort_by" onchange="this.form.submit()">
                                    <option value="oldest" {{ request('sort_by') == 'oldest' ? 'selected' : '' }}>Oldest to
                                        Newest</option>
                                    <option value="newest" {{ request('sort_by') == 'newest' ? 'selected' : '' }}>Newest to
                                        Oldest</option>
                                </select>
                            </form>
                        </div>

                        <!-- Trash Button -->
                        <div class="col-6 col-md-2">
                            <a href="{{ route('customers.trash') }}"
                                class="btn btn-dark w-100 d-flex align-items-center justify-content-center">
                                <i class="fas fa-trash me-2"></i> View Trash
                            </a>
                        </div>
                    </div>
                </div>


                <!-- Card Body -->
                <div class="card-body">
                    @if ($customers->isEmpty())
                        <p class="text-center text-muted">No customers found that match your search criteria.</p>
                    @else
                        <div class="table-responsive">
                            <!-- Desktop Table -->
                            <table class="table table-striped table-hover text-center d-none d-md-table">
                                <thead class="table-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Bank Number</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td>{{ $customer->id }}</td>
                                            <td>{{ $customer->firstName }}</td>
                                            <td>{{ $customer->lastName }}</td>
                                            <td>{{ $customer->phoneNumber }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->bankNumber }}</td>
                                            <td>
                                                <!-- Action Buttons -->
                                                <a href="{{ route('customers.edit', $customer->id) }}"
                                                    class="text-info me-2">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <a href="{{ route('customers.show', $customer->id) }}"
                                                    class="text-primary me-2">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                                <a href="javascript:;" onclick="$('.form-{{ $customer->id }}').submit()"
                                                    class="text-danger me-2">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>

                                                <!-- Delete Form -->
                                                <form class="form-{{ $customer->id }}"
                                                    action="{{ route('customers.destroy', $customer->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
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
                                            <h5 class="card-title text-primary">
                                                #{{ $customer->id }} - {{ $customer->firstName }}
                                                {{ $customer->lastName }}
                                            </h5>
                                            <p><strong>Phone:</strong> {{ $customer->phoneNumber }}</p>
                                            <p><strong>Email:</strong> {{ $customer->email }}</p>
                                            <p><strong>Bank Number:</strong> {{ $customer->bankNumber }}</p>
                                            <div class="d-flex justify-content-end mt-2">
                                                <a href="{{ route('customers.edit', $customer->id) }}"
                                                    class="btn btn-outline-info btn-sm me-2">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <a href="{{ route('customers.show', $customer->id) }}"
                                                    class="btn btn-outline-primary btn-sm me-2">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                                <a href="javascript:;" onclick="$('.form-{{ $customer->id }}').submit()"
                                                    class="btn btn-outline-danger btn-sm">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
