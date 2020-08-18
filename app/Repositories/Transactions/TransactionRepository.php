<?php

namespace App\Repositories\Transactions;

use App\Contracts\Transactions\Mappers\TransactionMapperInterface;
use App\Entities\Transactions\TransactionEntity;
use App\Model\Transactions;
use App\Contracts\Transactions\Repositories\TransactionRepositoryInterface;
use Ramsey\Uuid\Uuid;

/**
 * Class TransactionRepository
 * @package App\Repositories\Transactions
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionRepository implements TransactionRepositoryInterface
{
    /** @var \App\Model\Transactions */
    private $transactionModel;

    /** @var \Illuminate\Database\Eloquent\Builder */
    private $queryBuilder;

    /** @var \App\Contracts\Transactions\Mappers\TransactionMapperInterface */
    private $transactionMapper;

    /**
     * TransactionRepository constructor.
     * @param \App\Model\Transactions $transactionModel
     */
    public function __construct(Transactions $transactionModel, TransactionMapperInterface $transactionMapper)
    {
        $this->transactionModel = $transactionModel;
        $this->queryBuilder = $transactionModel->newQuery();
        $this->transactionMapper = $transactionMapper;
    }

    /**
     * @param \App\Entities\Transactions\TransactionEntity $transactionEntity
     * @return \App\Entities\Transactions\TransactionEntity
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
