@extends('layouts.app')

@section('title', 'Create Customer')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <h3 class="mb-4 text-center text-primary">Create Customer</h3>
            <div class="card shadow-sm">
                <div class="card-header bg-light border-0">
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{ route('customers.index') }}" class="btn btn-primary d-flex align-items-center">
                                <i class="fas fa-chevron-left me-2"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="image" class="form-label">Profile Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        id="image" name="image">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control @error('firstName') is-invalid @enderror"
                                        id="firstName" name="firstName" placeholder="Enter first name"
                                        value="{{ old('firstName') }}" required>
                                    @error('firstName')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control @error('lastName') is-invalid @enderror"
                                        id="lastName" name="lastName" placeholder="Enter last name"
                                        value="{{ old('lastName') }}" required>
                                    @error('lastName')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" placeholder="Enter email" value="{{ old('email') }}"
                                        required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control @error('phoneNumber') is-invalid @enderror"
                                        id="phone" name="phoneNumber" placeholder="Enter phone number"
                                        value="{{ old('phoneNumber') }}" required>
                                    @error('phoneNumber')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="ban" class="form-label">Bank Account Number</label>
                                    <input type="text" class="form-control @error('bankNumber') is-invalid @enderror"
                                        id="ban" name="bankNumber" placeholder="Enter bank account number"
                                        value="{{ old('bankNumber') }}" required>
                                    @error('bankNumber')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="ban" class="form-label">About</label>
                                    <textarea name="about" class="form-control @error('about') is-invalid @enderror">{{ old('about') }}</textarea>
                                    @error('about')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 text-end">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save me-2"></i>Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            border: none;
            border-radius: 8px;
        }

        .card-header {
            border-bottom: 2px solid #f0f0f0;
        }

        .form-group label {
            font-weight: 500;
            color: #333;
        }

        .form-control {
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 0.5rem 1rem;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }

        /* Button Styling */
        .btn-primary {
            background-color: #4a4ff7;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #3c3dce;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-success:hover {
            background-color: #218838;
        }
    </style>
@endsection
