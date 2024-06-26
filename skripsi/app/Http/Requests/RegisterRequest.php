<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => 'required|max:20',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];
    }
}
