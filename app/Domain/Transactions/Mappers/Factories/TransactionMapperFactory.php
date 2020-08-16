<?php

namespace App\Domain\Transactions\Mappers\Factories;

use App\Domain\Transactions\Entities\TransactionEntity;
use App\Domain\Transactions\Mappers\TransactionMapper;

/**
 * Class TransactionMapperFactory
 * @package App\Domain\Transactions\Mappers\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionMapperFactory
{
    /**
     * @return \App\Domain\Transactions\Mappers\TransactionMapper
     */
    public function __invoke()
    {
        /** @var TransactionEntity $transactionEntity */
        $transactionEntity = app(TransactionEntity::class);
        return new TransactionMapper($transactionEntity);
    }
}
