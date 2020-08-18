<?php

namespace App\Contracts\Transactions\Services;

use App\Entities\Transactions\TransactionEntity;

/**
 * Interface TransactionInterface
 * @package App\Contracts\Transactions\Services
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface TransactionServiceInterface
{
    /**
     * Método para realizar transferências
     * @param \App\Entities\Transactions\TransactionEntity $transactionEntity
     * @return \App\Entities\Transactions\TransactionEntity
     */
    public function transfer(TransactionEntity $transactionEntity): TransactionEntity;
}
