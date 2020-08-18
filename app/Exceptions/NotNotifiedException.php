<?php

namespace App\Exceptions;

use Exception;
use Fig\Http\Message\StatusCodeInterface;

class NotNotifiedException extends Exception
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function render()
    {
        return response()->json(
            ['error' => $this->getMessage()],
            StatusCodeInterface::STATUS_UNPROCESSABLE_ENTITY
        );
    }
}
