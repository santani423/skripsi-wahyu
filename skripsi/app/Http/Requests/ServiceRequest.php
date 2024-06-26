<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => [
                'required',

            ],
            'imageUrl' => [
               'required'
            ],
            'description' =>[
                'required'
            ],
            'price' => [
                'required', 'numeric'
            ]
        ];
    }
}
