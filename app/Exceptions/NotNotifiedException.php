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
            ['error' => "Error when sending user notification"],
            StatusCodeInterface::STATUS_UNPROCESSABLE_ENTITY
        );
    }
}
