<?php

namespace Backend\Models\User;

use App\Http\Controllers\Controller;
use Backend\Models\User\Actions\CadastroAction;
use Backend\Models\User\Requests\UserRequest;
use Illuminate\Http\JsonResponse;

class UserController extends Controller {

    public function cadastro(UserRequest $request, CadastroAction $action): JsonResponse
    {
        $action->handle($request->validated());

        return response()->json([],204);
    }
}
