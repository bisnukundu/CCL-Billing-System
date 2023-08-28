<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'mobile' => 'required|string|max:14',
            'customer_type' => 'required|string',
            'monthly_bill' => 'required|numeric',
            'additional_charge' => 'required|numeric',
            'discount' => 'required|numeric',
            'active' => 'required|boolean',
            'connection_date' => 'nullable|date',
            'note' => 'nullable|string',
            'bill_collector' => 'nullable|string',
            'number_of_connection' => 'nullable|integer'
        ];
    }
}
