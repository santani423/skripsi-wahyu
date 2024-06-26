<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'paymentType' => [
                'required'
            ],
            'bankName' => [
                'required'
            ],
            'accountNumber' => [
                'required'
            ],
            'name' => [
                'required'
            ],
            'phoneNumber' => [
                'required'
            ],
            'imageTransfer' => [
                'nullable'
            ]
        ];
    }
}
