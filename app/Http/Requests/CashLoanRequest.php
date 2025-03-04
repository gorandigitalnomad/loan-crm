<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CashLoanRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'loan_amount' => 'required|numeric|min:1000|max:100000',
        ];
    }
}