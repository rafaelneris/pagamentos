<?php

namespace App\Domain\Transactions\Contracts\Services;

use App\Domain\Transactions\Entities\TransactionEntity;

/**
 * Interface AuthorizerServiceInterface
 * @package App\Domain\Transactions\Contracts\Services
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface AuthorizerServiceInterface
{
    /** @var string */
    public const STATUS_AUTHORIZED = 'Autorizado';

    /**
     * @param \App\Domain\Transactions\Entities\TransactionEntity $transactionEntity
     * @return bool
     */
    public function authorize(TransactionEntity $transactionEntity): bool;
}
