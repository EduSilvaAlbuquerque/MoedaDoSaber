<?php

namespace Backend\Models\User;

use Backend\Models\Professor\Professor;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {

    use HasFactory, HasApiTokens;

    protected $table      = 'pessoa';
    const CREATED_AT = 'data_cadastro';

    const UPDATED_AT = null;

    protected $fillable   = [
        'nome',
        'email',
        'senha',
        'fone',
        'data_cadastro'
    ];

    public function professor(): BelongsTo
    {
        return $this->belongsTo(Professor::class, 'id', 'id_pessoa');
    }
}
