<?php

namespace Tests\Application\Requests;

use App\Http\Requests\DefaultRequest;

/**
 * Class RequestConcret
 * @package Tests\Application\Requests
 */
class RequestConcret extends DefaultRequest
{
    /** @var array */
    protected array $rules = [
        'cpf' => 'required|string'
    ];

    /** @var array */
    protected array $messages = [
        'cpf.required' => 'CPF não informado'
    ];
}
