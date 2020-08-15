<?php

namespace App\Exceptions;

use Exception;
use Fig\Http\Message\StatusCodeInterface;

class UserNotFoundException extends Exception
{
    public function render()
    {
        return response()->json(['error' => $this->getMessage()], StatusCodeInterface::STATUS_NOT_FOUND);
    }
}
