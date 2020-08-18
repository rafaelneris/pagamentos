<?php

namespace App\Http\Controllers\Factories\Transactions;

use App\Contracts\Transactions\Mappers\TransactionMapperInterface;
use App\Http\Controllers\Transactions\TransactionController;
use App\Contracts\Transactions\Services\TransactionServiceInterface;

/**
 * Class TransactionControllerFactory
 * @package App\Http\Controllers\Factories\Transactions
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionControllerFactory
{
    /**
     * @return \App\Http\Controllers\Transactions\TransactionController
     */
    public function __invoke()
    {
        $transactionService = app(TransactionServiceInterface::class);
        $transactionMapper = app(TransactionMapperInterface::class);

        return new TransactionController($transactionService, $transactionMapper);
    }
}
