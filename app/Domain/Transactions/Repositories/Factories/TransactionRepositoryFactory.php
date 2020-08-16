<?php

namespace App\Domain\Transactions\Repositories\Factories;

use App\Domain\Transactions\Contracts\Mappers\TransactionMapperInterface;
use App\Infrastructure\Models\Transactions;
use App\Domain\Transactions\Repositories\TransactionRepository;

/**
 * Class TransactionServiceFactory
 * @package App\Domain\Transactions\Repositories\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionRepositoryFactory
{
    /**
     * @return \App\Domain\Transactions\Repositories\TransactionRepository
     */
    public function __invoke(): TransactionRepository
    {
        $transactionModel = app(Transactions::class);
        $transactionMapper = app(TransactionMapperInterface::class);

        return new TransactionRepository($transactionModel, $transactionMapper);
    }
}
