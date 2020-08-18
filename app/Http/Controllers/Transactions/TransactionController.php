<?php

namespace App\Http\Controllers\Transactions;

use App\Contracts\Transactions\Mappers\TransactionMapperInterface;
use App\Http\Controllers\Contracts\Transactions\TransactionControllerInterface;
use App\Http\Requests\Transactions\TransactionRequest;
use App\Contracts\Transactions\Services\TransactionServiceInterface;
use Fig\Http\Message\StatusCodeInterface;
use Illuminate\Http\JsonResponse;

/**
 * Class TransactionController
 * @package App\Http\Requests\Transactions
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionController implements TransactionControllerInterface
{
    /** @var \App\Contracts\Transactions\Services\TransactionServiceInterface */
    private $transactionService;

    /** @var \App\Contracts\Transactions\Mappers\TransactionMapperInterface */
    private $transactionMapper;

    /**
     * TransactionController constructor.
     * @param \App\Contracts\Transactions\Services\TransactionServiceInterface $transactionService
     * @param \App\Contracts\Transactions\Mappers\TransactionMapperInterface   $transactionMapper
     */
    public function __construct(
        TransactionServiceInterface $transactionService,
        TransactionMapperInterface $transactionMapper
    ) {
        $this->transactionService = $transactionService;
        $this->transactionMapper = $transactionMapper;
    }

    /**
     * @param \App\Http\Requests\Transactions\TransactionRequest $transactionRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function transfer(TransactionRequest $transactionRequest): JsonResponse
    {
        /** @var array $transactionData */
        $transactionData = $transactionRequest->post();

        /** @var \App\Entities\Transactions\TransactionEntity $transactionEntity */
        $transactionEntity = $this->transactionMapper->map($transactionData);

        $transactionEntity = $this->transactionService->transfer($transactionEntity);
        return response()->json(
            $this->transactionMapper->revert($transactionEntity),
            StatusCodeInterface::STATUS_OK
        );
    }
}
