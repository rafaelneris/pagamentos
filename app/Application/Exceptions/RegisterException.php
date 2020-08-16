<?php

namespace App\Application\Exceptions;

use Exception;
use Fig\Http\Message\StatusCodeInterface;

/**
 * Class RegisterException
 * @package App\Application\Exceptions
 */
class RegisterException extends Exception
{
    /**
     * @inheritDoc
     */
    public function render()
    {
        return response()->json(
            ['error' => "Erro ao cadastrar usuário"],
            StatusCodeInterface::STATUS_UNPROCESSABLE_ENTITY
        );
    }
}
