<?php

namespace Backend\Models\PlanoAula\Actions;

use Backend\Models\PlanoAula\PlanoAula;
use Backend\Models\User\User;

final readonly class DeleteAction {

    public function handle(int $id): bool
    {
        $model = PlanoAula::findOrFail($id);

        return $model->delete();
    }
}
