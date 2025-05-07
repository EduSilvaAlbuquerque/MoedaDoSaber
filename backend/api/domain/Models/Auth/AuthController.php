<?php

namespace Backend\Models\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Backend\Models\Auth\Actions\LoginAction;
use Backend\Models\Auth\Actions\LogoutAction;
use Backend\Models\Auth\Requests\AuthLoginRequest;
use Backend\Models\Auth\Resources\LoginResource;

class AuthController extends Controller {

    public function login(AuthLoginRequest $request, LoginAction $action): JsonResource
    {
        $user = $action->handle($request->all());

        return new LoginResource($user);
    }

    public function logout(Request $request, LogoutAction $action): JsonResponse
    {
        $action->handle($request);

        return response()->json(['message' => __('messages.success_logout')]);
    }

    public function me(): JsonResource
    {
        $user = auth()->user();

        return new LoginResource($user);
    }
}
