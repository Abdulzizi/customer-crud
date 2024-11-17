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

        // Searching
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($query) use ($search) {
                $query->where('firstName', 'like', "%{$search}%")
                    ->orWhere('lastName', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phoneNumber', 'like', "%{$search}%");
            });
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'oldest'); // Default to 'oldest' if not provided
        $query->orderBy('created_at', $sortBy === 'oldest' ? 'asc' : 'desc');

        $customers = $query->get();

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

        // dd($customer->image, $defaultImage);



        $customer->delete();

        session()->flash('successDelete', 'Delete was successful!');

        return redirect()->route('customers.index');
    }

    public function trashIndex()
    {
        $trashedCustomers = Customer::onlyTrashed()->get();
        return view('customers.trash', compact('trashedCustomers'));
    }

    public function trashRestore(string $id)
    {
        $customer = Customer::onlyTrashed()->findOrFail($id);

        // Restore the customer
        $customer->restore();

        session()->flash('successRestored', 'Customer restored successfully!');

        return redirect()->route('customers.index');
    }

    public function trashForceDelete(String $id)
    {
        $trashedCustomer = Customer::onlyTrashed()->findOrFail($id);
        $defaultImage = '/default-img/avatar.png';

        if ($trashedCustomer->image && $trashedCustomer->image !== $defaultImage) {
            File::delete(public_path($trashedCustomer->image));
        }

        $trashedCustomer->forceDelete();

        session()->flash('successPermanentDelete', 'Customer permanently deleted!');

        return redirect()->route('customers.index');
    }
}
