<?php

namespace App\Exceptions;


use Exception;
use Fig\Http\Message\StatusCodeInterface;

/**
 * Class StoreTransferException
 * @package App\Exceptions
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class NoFundsException extends Exception
{
    /**
     * @inheritDoc
     */
    public function render()
    {
        return response()->json(['error' => $this->getMessage()], StatusCodeInterface::STATUS_BAD_REQUEST);
    }
}
