<?php

namespace App\Exceptions\Api;

use Exception;

class JsonException extends Exception
{
    public function render($request): \Illuminate\Http\JsonResponse
    {
        return response()->json(['status' => false, 'message' => $this->getMessage()])
            ->setStatusCode($this->statusCode());
    }

    protected function statusCode(): int
    {
        return 500;
    }
}
