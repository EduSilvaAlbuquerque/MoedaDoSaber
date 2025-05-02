<?php

namespace Backend\Models\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthLoginRequest extends FormRequest {

    public function rules(): array
    {
        return [
            'cad_e_mail' => 'required|email|max:255',
            'cad_senha'  => 'required|string'
        ];
    }
}
