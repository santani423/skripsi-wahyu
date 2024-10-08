<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'orderDate' => [
                'required'
            ],
            'phoneNumber' => [
                'required'
            ],
            'address' => [
                'required'
            ]
        ];
    }
}
