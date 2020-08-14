<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\DefaultRequest;

/**
 * Class DepositBalanceRequest
 * @package App\Http\Requests\Users
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class DepositBalanceRequest extends DefaultRequest
{
    /** @var array */
    protected array $regras = [
        'userId' => 'required|integer',
        'value' => 'required|numeric'
    ];
}
