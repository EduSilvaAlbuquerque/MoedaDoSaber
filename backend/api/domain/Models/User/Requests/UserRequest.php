<?php

namespace Backend\Models\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest {

    public function rules(): array
    {
        return [
            'nome'            => 'required|string|max:100',
            'email'           => 'required|email|unique:pessoa',
            'senha'           => 'required|string|max:100',
            'fone'            => 'required|string|max:100',
            'cpf'             => 'required|string|max:100',
            'data_nascimento' => 'required|date'
        ];
    }
}
