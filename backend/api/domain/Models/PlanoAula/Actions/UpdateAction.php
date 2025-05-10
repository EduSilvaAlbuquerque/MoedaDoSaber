<?php

namespace Backend\Models\PlanoAula\Actions;

use Backend\Models\PlanoAula\PlanoAula;
use Backend\Models\User\User;

final readonly class UpdateAction {

    public function handle(int $id, array $data): bool
    {
        $model = PlanoAula::findOrFail($id);

        return $model->update($data);
    }
}
