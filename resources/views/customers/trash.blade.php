@extends('layouts.app')

@section('title', 'Trashed Customers')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <h3 class="mb-4 text-center text-danger">Trashed Customers</h3>
            <div class="card shadow-sm">
                <div class="card-body">
                    {{-- Check if there are no trashed customers --}}
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
                            {{-- Sample Hardcoded Data --}}
                            <tr>
                                <td>1</td>
                                <td>John</td>
                                <td>Doe</td>
                                <td>TzH5t@example.com</td>
                                <td>
                                    <!-- Restore Button -->
                                    <form action="#" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-outline-success">
                                            <i class="fas fa-undo"></i> Restore
                                        </button>
                                    </form>

                                    <!-- Permanently Delete Button -->
                                    <form action="#" method="POST" class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete permanently?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash-alt"></i> Delete Permanently
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
