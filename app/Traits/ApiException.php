<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ApiException
{
    public function render($request): JsonResponse
    {
        return response()->json(['status' => false, 'message' => $this->getMessage()])
            ->setStatusCode($this->getStatusCode());
    }

    private function getStatusCode(): int
    {
        if (!$this->getCode()) {
            return Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return $this->getCode();
    }
}
