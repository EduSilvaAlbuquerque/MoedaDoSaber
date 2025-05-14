<?php

namespace Backend\Models\PlanoAula\Actions;

use Backend\Models\PlanoAula\PlanoAula;
use Backend\Models\User\User;

final readonly class CreateAction {

    public function handle(array $data): PlanoAula
    {
        return PlanoAula::create($data);
    }
}
