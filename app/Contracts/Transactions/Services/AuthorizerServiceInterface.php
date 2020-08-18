<?php

namespace App\Contracts\Transactions\Services;

use App\Entities\Transactions\TransactionEntity;

/**
 * Interface AuthorizerServiceInterface
 * @package App\Contracts\Transactions\Services
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface AuthorizerServiceInterface
{
    /** @var string */
    public const STATUS_AUTHORIZED = 'Autorizado';

    /**
     * @param \App\Entities\Transactions\TransactionEntity $transactionEntity
     * @return bool
     */
    public function authorize(TransactionEntity $transactionEntity): bool;
}
