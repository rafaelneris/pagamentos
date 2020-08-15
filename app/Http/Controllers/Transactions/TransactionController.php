<?php

namespace App\Http\Controller\Transactions;

use App\Http\Controllers\Contracts\Transactions\TransactionControllerInterface;
use App\Http\Requests\Transactions\TransactionRequest;
use App\Services\Contracts\Transactions\TransactionServiceInterface;
use Fig\Http\Message\StatusCodeInterface;
use Illuminate\Http\JsonResponse;

/**
 * Class TransactionController
 * @package App\Http\Requests\Transactions
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionController implements TransactionControllerInterface
{
    /** @var \App\Services\Contracts\Transactions\TransactionServiceInterface */
    private $transactionService;

    /**
     * TransactionController constructor.
     * @param \App\Services\Contracts\Transactions\TransactionServiceInterface $transactionService
     */
    public function __construct(TransactionServiceInterface $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    /**
     * @param \App\Http\Requests\Transactions\TransactionRequest $transactionRequest
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\NoFundsException
     * @throws \App\Exceptions\StoreTransferException
     *
     */
    public function transfer(TransactionRequest $transactionRequest): JsonResponse
    {
        $transactionData = $transactionRequest->post();
        $this->transactionService->transfer($transactionData);
        return response()->json([], 200);
    }
}
