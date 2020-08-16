<?php

namespace App\Application\Requests\Transactions;

use App\Application\Requests\DefaultRequest;

/**
 * Class TransactionRequest
 * @package App\Application\Requests\Transactions
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionRequest extends DefaultRequest
{
    /** @var array */
    protected array $rules = [
        'payer' => 'required|string',
        'payee' => 'required|string',
        'value' => 'required|integer|min:0,01'
    ];
}
