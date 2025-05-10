<?php

namespace Backend\Models\Auth\Actions;

use Illuminate\Support\Facades\Auth;
use Backend\Base\Exceptions\BackendException;
use Backend\Models\User\User;

final readonly class LoginAction {

    public function __construct(protected User $model) {}

    public function handle(array $data): array
    {
        $email = $data['email'];
        $password = $data['senha'];

        $user = User::select('pessoa.id','email', 'professor.nome')
                    ->join('professor', 'professor.id_pessoa', '=', 'pessoa.id')
                    ->where('email', $email)
                    ->where('senha', $password)
                    ->first();

        throw_if(!$user, new BackendException(__('messages.invalid_login')));

        $token = $user->createToken('token-api')->plainTextToken;

        return [
            'token' => $token,
            'user' => $user
        ];
    }
}
