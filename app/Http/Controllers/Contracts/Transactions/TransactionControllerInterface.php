<?php

namespace App\Http\Controllers\Contracts\Transactions;

use App\Http\Requests\Transactions\TransactionRequest;
use Illuminate\Http\JsonResponse;

/**
 * Interface TransactionControllerInterface
 * @package App\Http\Controllers\Contracts\Transactions
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface TransactionControllerInterface
{
    /**
     * Action para transferência
     * @param \App\Http\Requests\Transactions\TransactionRequest $transactionRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function transfer(TransactionRequest $transactionRequest): JsonResponse;
}
