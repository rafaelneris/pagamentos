<?php

namespace App\Application\Exceptions;

use Exception;
use Fig\Http\Message\StatusCodeInterface;
use Illuminate\Http\JsonResponse;

/**
 * Class UserNotFoundException
 * @package App\Application\Exceptions
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserNotFoundException extends Exception
{
    public function render(): JsonResponse
    {
        return response()->json(
            ['error' => "Usuário {$this->getMessage()} não existe"],
            StatusCodeInterface::STATUS_NOT_FOUND
        );
    }
}
