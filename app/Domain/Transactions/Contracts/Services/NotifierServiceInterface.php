<?php

namespace App\Domain\Transactions\Contracts\Services;

use App\Domain\Transactions\Entities\TransactionEntity;

/**
 * Interface NotifierServiceContract
 * @package App\Services\Contracts
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface NotifierServiceInterface
{
    /** @var string */
    public const STATUS_NOTIFIED = 'Enviado';

    /**
     * @param \App\Domain\Transactions\Entities\TransactionEntity $transactionEntity
     * @return bool
     */
    public function notify(TransactionEntity $transactionEntity): bool;
}
