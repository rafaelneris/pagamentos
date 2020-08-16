<?php

namespace App\Interfaces\Http\Controller\Transactions;

use App\Domain\Transactions\Contracts\Mappers\TransactionMapperInterface;
use App\Interfaces\Http\Controllers\Contracts\Transactions\TransactionControllerInterface;
use App\Application\Requests\Transactions\TransactionRequest;
use App\Domain\Transactions\Contracts\Services\TransactionServiceInterface;
use Fig\Http\Message\StatusCodeInterface;
use Illuminate\Http\JsonResponse;

/**
 * Class TransactionController
 * @package App\Application\Requests\Transactions
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionController implements TransactionControllerInterface
{
    /** @var \App\Domain\Transactions\Contracts\Services\TransactionServiceInterface */
    private $transactionService;

    /** @var \App\Domain\Transactions\Contracts\Mappers\TransactionMapperInterface */
    private $transactionMapper;

    /**
     * TransactionController constructor.
     * @param \App\Domain\Transactions\Contracts\Services\TransactionServiceInterface $transactionService
     * @param \App\Domain\Transactions\Contracts\Mappers\TransactionMapperInterface   $transactionMapper
     */
    public function __construct(
        TransactionServiceInterface $transactionService,
        TransactionMapperInterface $transactionMapper
    ) {
        $this->transactionService = $transactionService;
        $this->transactionMapper = $transactionMapper;
    }

    /**
     * @param \App\Application\Requests\Transactions\TransactionRequest $transactionRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function transfer(TransactionRequest $transactionRequest): JsonResponse
    {
        /** @var array $transactionData */
        $transactionData = $transactionRequest->post();

        /** @var \App\Domain\Transactions\Entities\TransactionEntity $transactionEntity */
        $transactionEntity = $this->transactionMapper->map($transactionData);

        $transactionEntity = $this->transactionService->transfer($transactionEntity);
        return response()->json(
            $this->transactionMapper->revert($transactionEntity),
            StatusCodeInterface::STATUS_OK
        );
    }
}
