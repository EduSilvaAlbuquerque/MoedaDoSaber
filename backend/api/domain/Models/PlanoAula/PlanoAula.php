<?php

namespace Backend\Models\PlanoAula;

use Backend\Models\Professor\Professor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlanoAula Extends Model {

    protected $table = 'plano_aula';

    public $timestamps = false;
    protected $fillable = [
        'id_professor',
        'titulo',
        'objetivo',
        'conteudo',
        'metodologia',
        'recursos_necessarios',
        'criterios_avaliacao',
        'inicio_cronograma',
        'fim_cronograma'
    ];

    public function professor(): BelongsTo
    {
        return $this->belongsTo(Professor::class, 'id_professor', 'id');
    }
}
