<?php

namespace Backend\Models\PlanoAula\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlanoAulaResource extends JsonResource {

    public function toArray($request): array
    {
        return [
            'id'                   => $this->id,
            'titulo'               => $this->titulo,
            'objetivo'             => $this->objetivo,
            'conteudo'             => $this->conteudo,
            'metodologia'          => $this->metodologia,
            'recursos_necessarios' => $this->recursos_necessarios,
            'criterios_avaliacao'  => $this->criterios_avaliacao,
            'inicio_cronograma'    => $this->inicio_cronograma,
            'fim_cronograma'       => $this->fim_cronograma,
        ];
    }
}
