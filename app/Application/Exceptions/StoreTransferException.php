<?php

namespace App\Application\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Class StoreTransferException
 * @package App\Application\Exceptions
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class StoreTransferException extends Exception
{
    /**
     * @inheritDoc
     */
    public function render(): JsonResponse
    {
        return response()->json(['error' => $this->getMessage()]);
    }
}
