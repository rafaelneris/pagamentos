<?php

namespace App\Domain\Transactions\Repositories;

use App\Domain\Transactions\Contracts\Mappers\TransactionMapperInterface;
use App\Domain\Transactions\Entities\TransactionEntity;
use App\Infrastructure\Models\Transactions;
use App\Domain\Transactions\Contracts\Repositories\TransactionRepositoryInterface;
use Ramsey\Uuid\Uuid;

/**
 * Class TransactionRepository
 * @package App\Domain\Transactions\Repositories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionRepository implements TransactionRepositoryInterface
{
    /** @var \App\Infrastructure\Models\Transactions */
    private $transactionModel;

    /** @var \Illuminate\Database\Eloquent\Builder */
    private $queryBuilder;

    /** @var \App\Domain\Transactions\Contracts\Mappers\TransactionMapperInterface */
    private $transactionMapper;

    /**
     * TransactionRepository constructor.
     * @param \App\Infrastructure\Models\Transactions $transactionModel
     */
    public function __construct(Transactions $transactionModel, TransactionMapperInterface $transactionMapper)
    {
        $this->transactionModel = $transactionModel;
        $this->queryBuilder = $transactionModel->newQuery();
        $this->transactionMapper = $transactionMapper;
    }

    /**
     * @param \App\Domain\Transactions\Entities\TransactionEntity $transactionEntity
     * @return \App\Domain\Transactions\Entities\TransactionEntity
     */
    public function registerTransaction(TransactionEntity $transactionEntity): TransactionEntity
    {
        $uuId = Uuid::uuid4();
        $transactionEntity->setId($uuId);
        $transactionData = $this->transactionMapper->revert($transactionEntity);
        $queryBuilder = clone $this->queryBuilder;
        $queryBuilder->insert($transactionData);
        return $transactionEntity;
    }
}
