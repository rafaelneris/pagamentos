<?php

namespace App\Exceptions;

use Exception;
use Fig\Http\Message\StatusCodeInterface;
use Illuminate\Http\JsonResponse;

/**
 * Class UserNotFoundException
 * @package App\Exceptions
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserNotFoundException extends Exception
{
    public function render(): JsonResponse
    {
        return response()->json(
            ['error' => "User not found"],
            StatusCodeInterface::STATUS_NOT_FOUND
        );
    }
}
