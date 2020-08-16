<?php

namespace App\Application\Exceptions;

use Exception;
use Fig\Http\Message\StatusCodeInterface;

class UserNotFoundException extends Exception
{
    public function render()
    {
        return response()->json(['error' => "Usuário {$this->getMessage()} não existe"], StatusCodeInterface::STATUS_NOT_FOUND);
    }
}
