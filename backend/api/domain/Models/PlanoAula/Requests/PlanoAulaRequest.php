<?php

namespace Backend\Models\PlanoAula\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanoAulaRequest extends FormRequest {

    public function rules(): array
    {
        return [
            'id_professor'         => 'required|exists:professor,id',
            'titulo'               => 'required|string|max:100',
            'objetivo'             => 'required|string|max:250',
            'metodologia'          => 'required|string|max:250',
            'recursos_necessarios' => 'required|string|max:250',
            'criterios_avaliacao'  => 'required|string|max:250',
            'inicio_cronograma'    => 'required|date',
            'fim_cronograma'       => 'required|date'
        ];
    }
}
