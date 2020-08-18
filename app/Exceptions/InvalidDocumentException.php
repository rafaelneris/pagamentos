<?php

namespace App\Exceptions;

use Fig\Http\Message\StatusCodeInterface;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Class InvalidDocumentException
 * @package App\Exceptions
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class InvalidDocumentException extends Exception
{
    /**
     * @inheritDoc
     */
    public function render(): JsonResponse
    {
        return response()->json(
            ['error' => "Documento Inválido"],
            StatusCodeInterface::STATUS_UNPROCESSABLE_ENTITY
        );
    }
}
