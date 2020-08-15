<?php

namespace App\Exceptions;

use Exception;

class StoreTransferException extends Exception
{
    /**
     * @inheritDoc
     */
    public function render()
    {
        return response()->json(['error' => $this->getMessage()]);
    }
}
