@extends('layouts.app')

@section('title', 'Trashed Customers')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <h3 class="mb-4 text-center text-danger">Trashed Customers</h3>
            <div class="card shadow-sm">
                <div class="card-body">
                    {{-- Check if there are no trashed customers --}}
                    @if ($trashedCustomers->isEmpty())
                        <p class="text-center text-muted">No trashed customers found.</p>
                    @else
                        <table class="table table-striped table-hover text-center">
                            <thead class="table-danger">
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trashedCustomers as $customer)
                                    <tr>
                                        <td>{{ $customer->id }}</td>
                                        <td>{{ $customer->firstName }}</td>
                                        <td>{{ $customer->lastName }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>
                                            <!-- Restore Button -->
                                            <form action="{{ route('customers.restore', $customer->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-outline-success">
                                                    <i class="fas fa-undo"></i> Restore
                                                </button>
                                            </form>

                                            <a href="javascript:;" onclick="$('.deleted-form-{{ $customer->id }}').submit()"
                                                class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash-alt"></i> Delete Permanently
                                            </a>

                                            <!-- Delete Form -->
                                            <form class="deleted-form-{{ $customer->id }}"
                                                action="{{ route('customers.forceDelete', $customer->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete permanently?')"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
