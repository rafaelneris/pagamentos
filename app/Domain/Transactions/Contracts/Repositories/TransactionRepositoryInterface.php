<?php

namespace App\Domain\Transactions\Contracts\Repositories;

use App\Domain\Transactions\Entities\TransactionEntity;

/**
 * Interface TransactionRepositoryInterface
 * @package App\Domain\Transactions\Contracts\Repositories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface TransactionRepositoryInterface
{
    /**
     * @param \App\Domain\Transactions\Entities\TransactionEntity $transactionEntity
     * @return \App\Domain\Transactions\Entities\TransactionEntity
     */
    public function registerTransaction(TransactionEntity $transactionEntity): TransactionEntity;
}
