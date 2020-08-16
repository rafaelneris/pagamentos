<?php

namespace App\Domain\Transactions\Contracts\Services;

use App\Domain\Transactions\Entities\TransactionEntity;

/**
 * Interface TransactionInterface
 * @package App\Domain\Transactions\Contracts\Services
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface TransactionServiceInterface
{
    /**
     * Método para realizar transferências
     * @param \App\Domain\Transactions\Entities\TransactionEntity $transactionEntity
     * @return \App\Domain\Transactions\Entities\TransactionEntity
     */
    public function transfer(TransactionEntity $transactionEntity): TransactionEntity;
}
