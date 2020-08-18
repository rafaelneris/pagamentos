<?php

namespace App\Repositories\Transactions\Factories;

use App\Contracts\Transactions\Mappers\TransactionMapperInterface;
use App\Model\Transactions;
use App\Repositories\Transactions\TransactionRepository;

/**
 * Class TransactionServiceFactory
 * @package App\Repositories\Transactions\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionRepositoryFactory
{
    /**
     * @return \App\Repositories\Transactions\TransactionRepository
     */
    public function __invoke(): TransactionRepository
    {
        $transactionModel = app(Transactions::class);
        $transactionMapper = app(TransactionMapperInterface::class);

        return new TransactionRepository($transactionModel, $transactionMapper);
    }
}
