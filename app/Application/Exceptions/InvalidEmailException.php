<?php

namespace App\Application\Exceptions;

use Exception;
use Fig\Http\Message\StatusCodeInterface;

class InvalidEmailException extends Exception
{
    /**
     * @inheritDoc
     */
    public function render()
    {
        return response()->json(
            ['error' => "Email inválido"],
            StatusCodeInterface::STATUS_UNPROCESSABLE_ENTITY
        );
    }
}
