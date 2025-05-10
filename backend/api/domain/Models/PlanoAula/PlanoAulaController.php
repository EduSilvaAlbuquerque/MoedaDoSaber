<?php

namespace Backend\Models\PlanoAula;

use App\Http\Controllers\Controller;
use Backend\Models\PlanoAula\Actions\CreateAction;
use Backend\Models\PlanoAula\Actions\DeleteAction;
use Backend\Models\PlanoAula\Actions\IndexAction;
use Backend\Models\PlanoAula\Actions\UpdateAction;
use Backend\Models\PlanoAula\Requests\PlanoAulaRequest;
use Backend\Models\PlanoAula\Resources\PlanoAulaResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanoAulaController extends Controller {

    public function index(IndexAction $action): JsonResource
    {
        $row = $action->handle();

        return PlanoAulaResource::collection($row);
    }

    public function store(PlanoAulaRequest $request, CreateAction $action): JsonResource
    {
        $row = $action->handle($request->validated());

        return new PlanoAulaResource($row);
    }

    public function update(int $id, PlanoAulaRequest $request,UpdateAction $action): JsonResponse
    {
        $action->handle($id, $request->validated());

        return response()->json([], 204);
    }

    public function destroy(int $id, DeleteAction $action): JsonResponse
    {
        $action->handle($id);

        return response()->json([], 204);
    }
}
