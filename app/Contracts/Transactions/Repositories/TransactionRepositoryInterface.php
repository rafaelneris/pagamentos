<?php

namespace App\Contracts\Transactions\Repositories;

use App\Entities\Transactions\TransactionEntity;

/**
 * Interface TransactionRepositoryInterface
 * @package App\Contracts\Transactions\Repositories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface TransactionRepositoryInterface
{
    /**
     * @param \App\Entities\Transactions\TransactionEntity $transactionEntity
     * @return \App\Entities\Transactions\TransactionEntity
     */
    public function registerTransaction(TransactionEntity $transactionEntity): TransactionEntity;
}
