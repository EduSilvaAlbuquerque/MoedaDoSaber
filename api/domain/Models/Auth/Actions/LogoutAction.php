<?php

namespace Backend\Models\Auth\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final readonly class LogoutAction {

    public function __construct() {}

    public function handle(Request $request): void
    {if ($request->bearerToken()) {
        $request->user()->currentAccessToken()->delete();
    }

        if ($request->hasSession()) {
            Auth::guard('web')->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
    }
}
