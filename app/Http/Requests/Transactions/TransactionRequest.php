<?php

namespace App\Http\Requests\Transactions;

use App\Http\Requests\DefaultRequest;

/**
 * Class TransactionRequest
 * @package App\Http\Requests\Transactions
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionRequest extends DefaultRequest
{
    /** @var array */
    protected array $rules = [
        'payer' => 'required|integer',
        'payee' => 'required|integer',
        'value' => 'required|integer|min:0,01'
    ];
}
