<?php

namespace Backend\Base\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class BackendException extends Exception {

    public function __construct(string $message, int $code = 422, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render(): JsonResponse
    {
        return response()->json([
            'status'  => 'error',
            'message' => $this->getMessage(),
        ], $this->getCode());
    }
}
