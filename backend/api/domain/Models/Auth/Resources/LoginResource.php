<?php

namespace Backend\Models\Auth\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource {

    public function toArray($request): array
    {
        return [
            'token' => $this['token'],
            'user' => $this['user']
        ];
    }
}
