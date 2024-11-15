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
    public function index(Request $request)
    {
        $query = Customer::query();

        // searching
        if ($request->has('search') && !empty($request->search)) {
            $query->where(function ($query) use ($request) {
                $query->where('firstName', 'like', '%' . $request->search . '%')
                    ->orWhere('lastName', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('phoneNumber', 'like', '%' . $request->search . '%');
            });
        }

        // sorting
        if ($request->has('sort_by') && $request->sort_by == 'oldest') {
            $query->orderBy('created_at', 'asc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $customers = $query->get();
        // dd($customers);
        return view('customers.index', compact('customers'));
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
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerStoreRequest $request, string $id)
    {
        $customer = Customer::findOrFail($id);

        // Updating data
        $customer->firstName = $request->input('firstName');
        $customer->lastName = $request->input('lastName');
        $customer->email = $request->input('email');
        $customer->phoneNumber = $request->input('phoneNumber');
        $customer->bankNumber = $request->input('bankNumber');
        $customer->about = $request->input('about');

        // handling image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Store the file and get its path
            $path = $image->store('/', 'public');
            $customer->image = 'uploads/' . $path;
        }

        $customer->save();

        return redirect()->route('home')->with('success', 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
