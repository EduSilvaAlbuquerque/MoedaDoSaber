<?php

namespace Backend\Models\Auth;

use Backend\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\ValidationException;

class AuthService {

    public function login(string $email, string $password, bool $remember): User
    {
        $credentials = [
            'email'    => $email,
            'password' => $password
        ];

        if ( ! Auth::attempt($credentials, $remember)) {
            throw ValidationException::withMessages(['email' => Lang::get('messages.invalid_login')]);
        }

        $user = auth()->user();

        $this->setToken($user);

        return $user;
    }

    public function loginUser(User $user): User
    {
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

    public function logout(Request $request): void
    {
        if ($request->bearerToken()) {
            $request->user()->currentAccessToken()->delete();
        }

        if ($request->hasSession()) {
            Auth::guard('web')->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
    }
}
