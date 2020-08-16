<?php

namespace App\Domain\Transactions\Contracts\Services;

use App\Domain\Transactions\Entities\TransactionEntity;

/**
 * Interface TransferServiceInterface
 * @package App\Domain\Transactions\Contracts\Services
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface TransferServiceInterface
{
    /**
     * @param \App\Domain\Transactions\Entities\TransactionEntity $transactionEntity
     * @throws \App\Application\Exceptions\UserNotFoundException
     */
    public function transfer(TransactionEntity $transactionEntity): void;
}
