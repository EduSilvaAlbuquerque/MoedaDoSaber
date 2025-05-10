<?php

namespace Backend\Models\Professor;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model {

    protected $table      = 'professor';

    public $timestamps    = false;

    protected $fillable   = [
        'id_pessoa',
        'nome',
        'cpf',
        'data_nascimento',
    ];
}
