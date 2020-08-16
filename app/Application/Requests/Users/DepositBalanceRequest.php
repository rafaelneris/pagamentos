<?php

namespace App\Application\Requests\Users;

use App\Application\Requests\DefaultRequest;

/**
 * Class DepositBalanceRequest
 * @package App\Application\Requests\Users
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class DepositBalanceRequest extends DefaultRequest
{
    /** @var array */
    protected array $rules = [
        'userId' => 'required|string',
        'value' => 'required|numeric|min:1'
    ];
}
