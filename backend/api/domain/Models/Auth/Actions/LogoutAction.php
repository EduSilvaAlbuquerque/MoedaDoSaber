<?php

namespace Backend\Models\Auth\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final readonly class LogoutAction {

    public function handle(Request $request): void
    {
        $request->user()->currentAccessToken()->delete();
    }

}
