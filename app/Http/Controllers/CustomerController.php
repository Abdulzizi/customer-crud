<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

use File;

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
        if ($request->has('sort_by')) {
            if ($request->sort_by == 'oldest') {
                $query->orderBy('created_at', 'asc');
            } else {
                $query->orderBy('created_at', 'desc');
            }
        } else {
            // default = asc (oldest to newest)
            $query->orderBy('created_at', 'asc');
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

        session()->flash('successCreate', 'Create new customer was successful!');

        // Redirect with success message
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.detail', compact('customer'));
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

        // handling image upload
        if ($request->hasFile('image')) {
            // delete prev img
            File::delete(public_path($customer->image));

            $image = $request->file('image');

            // Store the file and get its path
            $path = $image->store('/', 'public');
            $customer->image = 'uploads/' . $path;
        }

        // Updating data
        $customer->firstName = $request->input('firstName');
        $customer->lastName = $request->input('lastName');
        $customer->email = $request->input('email');
        $customer->phoneNumber = $request->input('phoneNumber');
        $customer->bankNumber = $request->input('bankNumber');
        $customer->about = $request->input('about');

        $customer->save();

        session()->flash('successUpdate', 'Update was successful!');

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        $defaultImage = '/default-img/avatar.png';

        // dd($customer->image, $defaultImage);

        if ($customer->image && $customer->image !== $defaultImage) {
            File::delete(public_path($customer->image));
        }

        $customer->delete();

        session()->flash('successDelete', 'Delete was successful!');

        return redirect()->route('customers.index');
    }
}
