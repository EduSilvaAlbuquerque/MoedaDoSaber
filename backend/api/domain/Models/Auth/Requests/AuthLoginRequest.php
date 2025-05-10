<?php

namespace Backend\Models\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthLoginRequest extends FormRequest {

    public function rules(): array
    {
        return [
            'email' => 'required|email|max:255',
            'senha' => 'required|string'
        ];
    }
}
