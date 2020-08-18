<?php

namespace App\Mappers\Transactions\Factories;

use App\Entities\Transactions\TransactionEntity;
use App\Mappers\Transactions\TransactionMapper;

/**
 * Class TransactionMapperFactory
 * @package App\Mappers\Transactions\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionMapperFactory
{
    /**
     * @return \App\Mappers\Transactions\TransactionMapper
     */
    public function __invoke()
    {
        /** @var TransactionEntity $transactionEntity */
        $transactionEntity = app(TransactionEntity::class);
        return new TransactionMapper($transactionEntity);
    }
}
