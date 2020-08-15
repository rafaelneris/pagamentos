<?php

namespace App\Http\Controllers\Factories\Transactions;

use App\Http\Controller\Transactions\TransactionController;
use App\Services\Contracts\Transactions\TransactionServiceInterface;

/**
 * Class TransactionControllerFactory
 * @package App\Http\Controllers\Factories\Transactions
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionControllerFactory
{
    /**
     * @return \App\Http\Controller\Transactions\TransactionController
     */
    public function __invoke()
    {
        $transactionService = app(TransactionServiceInterface::class);

        return new TransactionController($transactionService);
    }
}
