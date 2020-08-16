<?php

namespace App\Application\Exceptions;

use Exception;
use Fig\Http\Message\StatusCodeInterface;

/**
 * Class PayerEqualsPayeeException
 * @package App\Application\Exceptions
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class PayerEqualsPayeeException extends Exception
{
    public function render()
    {
        return response()->json(
            ['error' => "Não é possível transferir dinheiro para você mesmo! Realize um depósito."],
            StatusCodeInterface::STATUS_BAD_REQUEST
        );
    }
}
