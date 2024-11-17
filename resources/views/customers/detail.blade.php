@extends('layouts.app')

@section('title', 'Detail Customer')

@section('content')

    <div class="row py-5 px-4">
        <div class="col-12 col-md-8 mx-auto"> <!-- Profile widget -->
            <a href="{{ route('customers.index') }}" class="btn mb-3" style="background-color: #4643d3; color: white;">
                <i class="fas fa-chevron-left"></i> Back
            </a>
            <div class="bg-white shadow rounded overflow-hidden">

                <!-- Banner Section -->
                <div class="cover"
                    style="background-image: url('https://picsum.photos/1600/400'); background-size: cover; background-position: center center; height: 250px; position: relative;">
                    <div class="d-flex flex-column flex-md-row align-items-center h-100 text-white px-4">
                        <!-- Profile Image Section -->
                        <div class="profile mb-3 mb-md-0" style="position: relative; margin-right: 20px;">
                            <img src="{{ asset($customer->image) }}" alt="Profile Picture"
                                class="rounded-circle mb-3 img-thumbnail border-4 border-white" width="130">
                        </div>

                        <!-- Customer Name and Email Info -->
                        <div class="media-body mb-2 ms-4"
                            style="position: relative; z-index: 2; background-color: rgba(0, 0, 0, 0.5); padding: 5px; border-radius: 5px;">
                            <h4 class="fs-4">{{ $customer->firstName }} {{ $customer->lastName }}</h4>
                            <p class="small mb-0">{{ $customer->email }}</p>
                        </div>
                    </div>
                </div>

                <!-- Customer Details Table -->
                <div class="px-4 py-3">
                    <div class="p-4 rounded shadow-sm bg-light">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td class="fw-semibold" style="width: 250px;">First Name</td>
                                    <td>{{ $customer->firstName }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold" style="width: 250px;">Last Name</td>
                                    <td>{{ $customer->lastName }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold" style="width: 250px;">Email</td>
                                    <td>{{ $customer->email }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold" style="width: 250px;">Phone</td>
                                    <td>{{ $customer->phoneNumber }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold" style="width: 250px;">Account Number</td>
                                    <td>{{ $customer->bankNumber }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold" style="width: 250px;">About</td>
                                    <td>{{ $customer->about }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
