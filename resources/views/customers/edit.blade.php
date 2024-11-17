@extends('layouts.app')

@section('title', 'Edit Customer')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <h3 class="mb-4 text-center text-primary">Edit Customer</h3>
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @if ($customer->image)
                            <div class="text-center mt-3">
                                <img src="{{ asset($customer->image) }}" alt="Customer Image"
                                    class="img-thumbnail rounded-circle shadow" width="150">
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control @error('firstName') is-invalid @enderror"
                                id="firstName" name="firstName" value="{{ old('firstName', $customer->firstName) }}"
                                required>
                            @error('firstName')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control @error('lastName') is-invalid @enderror"
                                id="lastName" name="lastName" value="{{ old('lastName', $customer->lastName) }}" required>
                            @error('lastName')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email', $customer->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phoneNumber" class="form-label">Phone Number</label>
                            <input type="text" class="form-control @error('phoneNumber') is-invalid @enderror"
                                id="phoneNumber" name="phoneNumber" value="{{ old('phoneNumber', $customer->phoneNumber) }}"
                                required>
                            @error('phoneNumber')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="bankNumber" class="form-label">Bank Number</label>
                            <input type="text" class="form-control @error('bankNumber') is-invalid @enderror"
                                id="bankNumber" name="bankNumber" value="{{ old('bankNumber', $customer->bankNumber) }}"
                                required>
                            @error('bankNumber')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="about" class="form-label">About</label>
                            <textarea class="form-control @error('about') is-invalid @enderror" id="about" name="about" rows="4">{{ old('about', $customer->about) }}</textarea>
                            @error('about')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success me-2">Save Changes</button>
                            <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
