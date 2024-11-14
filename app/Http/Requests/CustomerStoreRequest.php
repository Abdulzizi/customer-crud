<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => ['nullable', 'mimes:jpeg,jpg,png,gif', 'max:2048'], //optional for now
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phoneNumber' => ['required', 'string', 'max:20'],
            'bankNumber' => ['required', 'numeric', 'digits_between:10,20'],
            'about' => ['nullable', 'string', 'max:500'] //optional
        ];
    }

    public function messages()
    {
        return [
            'image.mimes' => 'The image must be a file of type: jpeg, jpg, png, gif.',
            'image.max' => 'The image size must not exceed 2MB.',
            'firstName.required' => 'Please enter the first name.',
            'firstName.string' => 'First name must be a valid string.',
            'firstName.max' => 'First name cannot be more than 255 characters.',
            'lastName.required' => 'Please enter the last name.',
            'lastName.string' => 'Last name must be a valid string.',
            'lastName.max' => 'Last name cannot be more than 255 characters.',
            'email.required' => 'Please provide a valid email address.',
            'email.email' => 'The email address must be a valid email.',
            'email.max' => 'Email cannot exceed 255 characters.',
            'phoneNumber.required' => 'Please provide a phone number.',
            'phoneNumber.string' => 'Phone number must be a valid string.',
            'phoneNumber.max' => 'Phone number cannot exceed 20 characters.',
            'bankNumber.required' => 'Please enter a bank account number.',
            'bankNumber.numeric' => 'Bank account number must be numeric.',
            'bankNumber.digits_between' => 'Bank account number must be between 10 and 20 digits.',
            'about.max' => 'The about field cannot exceed 500 characters.',
        ];
    }
}
