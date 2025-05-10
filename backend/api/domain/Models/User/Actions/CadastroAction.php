<?php

namespace Backend\Models\User\Actions;

use Backend\Models\Professor\Professor;
use Backend\Models\User\User;
use Illuminate\Support\Facades\DB;

final readonly class CadastroAction {

    public function handle(array $data): void
    {
         DB::transaction(function () use ($data) {

            $pessoa = User::create($data);

            $dataProfessor = [
                'id_pessoa' => $pessoa->id,
                ...$data
            ];

            Professor::create($dataProfessor);
        });

    }
}
