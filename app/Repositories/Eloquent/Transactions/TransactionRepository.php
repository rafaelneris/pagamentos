<?php

namespace App\Repositories\Eloquent\Transactions;

use App\Models\Transactions;
use App\Repositories\Contracts\Transactions\TransactionRepositoryInterface;

/**
 * Class TransactionRepository
 * @package App\Repositories\Eloquent\Transactions
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionRepository implements TransactionRepositoryInterface
{
    /** @var \App\Models\Transactions */
    private $transactionModel;

    /**
     * TransactionRepository constructor.
     * @param \App\Models\Transactions $transactionModel
     */
    public function __construct(Transactions $transactionModel)
    {
        $this->transactionModel = $transactionModel;
    }
}
