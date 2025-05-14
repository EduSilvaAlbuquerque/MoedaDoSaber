<?php

namespace Backend\Models\PlanoAula\Actions;

use Backend\Models\PlanoAula\PlanoAula;
use Backend\Models\User\User;
use Illuminate\Support\Collection;

final readonly class IndexAction {

    public function handle(): Collection
    {
        return PlanoAula::get();
    }
}
