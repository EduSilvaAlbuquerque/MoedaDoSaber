<?php

namespace Backend\Models\Auth\Actions;

use Illuminate\Support\Facades\Auth;
use Backend\Base\Exceptions\BackendException;
use Backend\Models\User\User;

final readonly class LoginAction {

    public function __construct(protected User $model) {}

    public function handle(array $data): User
    {
        $email = $data['cad_e_mail'];
        $password = $data['cad_senha'];

        $user = User::join('cad_representante', 'cad_representante.id_representante', '=', 'cad_empresa.id_empresa')
                    ->where('cad_e_mail', $email)
                    ->where('cad_senha', $password)
                    ->where('cad_ativo', '1')
                    ->first();

        throw_if(!$user, new BackendException(__('messages.invalid_login')));

        Auth::login($user);

        $this->setToken($user);

        return $user;
    }

    private function setToken(User $user): void
    {
        if ( ! requestFromFrontend()) {
            $token = $user->createToken('token-api')->plainTextToken;

            $user->setActiveToken($token);
        }
    }
}
