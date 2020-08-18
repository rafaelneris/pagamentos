<?php

namespace App\Contracts\Transactions\Services;

use App\Entities\Transactions\TransactionEntity;

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
     * @param \App\Entities\Transactions\TransactionEntity $transactionEntity
     * @return bool
     */
    public function notify(TransactionEntity $transactionEntity): bool;
}
