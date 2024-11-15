<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerStoreRequest $request)
    {
        $customer = new Customer();

        // Check if an image was uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Store the file and get its path
            $path = $image->store('/', 'public');
            $filePath = 'uploads/' . $path;

            $customer->image = $filePath;
        }

        $customer->firstName = $request->input('firstName');
        $customer->lastName = $request->input('lastName');
        $customer->email = $request->input('email');
        $customer->phoneNumber = $request->input('phoneNumber');
        $customer->bankNumber = $request->input('bankNumber');
        $customer->about = $request->input('about');

        $customer->save();

        // Redirect with success message
        return redirect()->route('home')->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
