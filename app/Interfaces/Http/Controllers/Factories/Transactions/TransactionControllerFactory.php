<?php

namespace App\Interfaces\Http\Controllers\Factories\Transactions;

use App\Domain\Transactions\Contracts\Mappers\TransactionMapperInterface;
use App\Interfaces\Http\Controller\Transactions\TransactionController;
use App\Domain\Transactions\Contracts\Services\TransactionServiceInterface;

/**
 * Class TransactionControllerFactory
 * @package App\Interfaces\Http\Controllers\Factories\Transactions
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionControllerFactory
{
    /**
     * @return \App\Interfaces\Http\Controller\Transactions\TransactionController
     */
    public function __invoke()
    {
        $transactionService = app(TransactionServiceInterface::class);
        $transactionMapper = app(TransactionMapperInterface::class);

        return new TransactionController($transactionService, $transactionMapper);
    }
}
