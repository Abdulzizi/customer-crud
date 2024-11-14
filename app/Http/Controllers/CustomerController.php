<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
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

        // Check if an image was uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $imageSize = $image->getSize();
            $imageMimeType = $image->getMimeType();
        } else {
            $imageName = null;
            $imageSize = null;
            $imageMimeType = null;
        }

        return response()->json([
            'status' => true,
            'message' => 'Form submitted',
            'data' => [
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'email' => $request->input('email'),
                'phoneNumber' => $request->input('phoneNumber'),
                'bankNumber' => $request->input('bankNumber'),
                'image' => [
                    'name' => $imageName,
                    'size' => $imageSize,
                    'type' => $imageMimeType
                ]
            ]
        ]);
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
