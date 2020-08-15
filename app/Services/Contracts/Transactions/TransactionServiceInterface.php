<?php

namespace App\Services\Contracts\Transactions;

/**
 * Interface TransactionInterface
 * @package App\Services\Contracts\Transactions
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface TransactionServiceInterface
{
    /**
     * Método para realizar transferências
     * @param array $transferData
     * @return array|null
     * @throws \App\Exceptions\StoreTransferException
     * @throws \App\Exceptions\NoFundsException
     */
    public function transfer(array $transferData): ?array;
}
