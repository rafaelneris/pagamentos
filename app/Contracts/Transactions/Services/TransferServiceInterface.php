<?php

namespace App\Contracts\Transactions\Services;

use App\Entities\Transactions\TransactionEntity;

/**
 * Interface TransferServiceInterface
 * @package App\Contracts\Transactions\Services
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface TransferServiceInterface
{
    /**
     * @param \App\Entities\Transactions\TransactionEntity $transactionEntity
     * @throws \App\Exceptions\UserNotFoundException
     */
    public function transfer(TransactionEntity $transactionEntity): void;
}
