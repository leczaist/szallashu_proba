<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CompanyRequest extends FormRequest
{
    /**
     * Validation rules that apply to the request.
     *
     * @return string[]
     */
    public function rules()
    {
        return [
            'companyName' => 'required|string|max:255',
            'companyRegistrationNumber' => 'required|string|max:255',
            'companyFoundationDate' => 'required|date',
            'country' => 'required|string|max:255',
            'zipCode' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'streetAddress' => 'required|string|max:255',
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
            'companyOwner' => 'required|string|max:255',
            'employees' => 'required|integer',
            'activity' => 'required|string|max:255',
            'active' => 'required|boolean',
            'email' => 'required|email',
            'password' => 'required|string|max:255',
        ];
    }

    /**
     * Custom error messages.
     *
     * @param Validator $validator
     *
     * @return mixed
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation failed.',
            'errors' => $validator->errors(),
        ]));
    }
}