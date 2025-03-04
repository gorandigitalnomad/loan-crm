<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeLoanRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'property_value' => 'required|numeric|min:10000',
            'down_payment' => [
                'required',
                'numeric',
                'min:0',
                function ($attribute, $value, $fail) {
                    $propertyValue = $this->input('property_value');
                    if ($value > $propertyValue) {
                        $fail('The down payment cannot be greater than the property value.');
                    }
                },
            ],
        ];
    }

    public function messages()
    {
        return [
            'down_payment.required' => 'The down payment is required.',
            'down_payment.numeric' => 'The down payment must be a number.',
            'down_payment.min' => 'The down payment must be at least 0.',
            'property_value.required' => 'The property value is required.',
            'property_value.numeric' => 'The property value must be a number.',
            'property_value.min' => 'The property value must be at least 10000.',
        ];
    }
}
