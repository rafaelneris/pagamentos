<?php

namespace App\Services\Transactions;

use App\Exceptions\NoFundsException;
use App\Exceptions\StoreTransferException;
use App\Repositories\Contracts\Transactions\TransactionRepositoryInterface;
use App\Services\Contracts\Transactions\TransactionServiceInterface;
use App\Services\Contracts\Transactions\TransferServiceInterface;
use App\Services\Contracts\Users\BalanceServiceInterface;
use App\Services\Contracts\Users\UserServiceInterface;

/**
 * Class TransactionService
 * @package App\Services\Transactions
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionService implements TransactionServiceInterface
{
    /** @var \App\Repositories\Contracts\Transactions\TransactionRepositoryInterface */
    private $transactionRepository;

    /** @var \App\Services\Contracts\Users\UserServiceInterface */
    private $userService;

    /** @var \App\Services\Contracts\Users\BalanceServiceInterface */
    private $balanceService;

    /** @var \App\Services\Contracts\Transactions\TransferServiceInterface */
    private $transferService;

    /**
     * TransactionService constructor.
     * @param \App\Repositories\Contracts\Transactions\TransactionRepositoryInterface $transactionRepository
     * @param \App\Services\Contracts\Users\UserServiceInterface                      $userService
     * @param \App\Services\Contracts\Users\BalanceServiceInterface                   $balanceService
     * @param \App\Services\Contracts\Transactions\TransferServiceInterface           $transferService
     */
    public function __construct(
        TransactionRepositoryInterface $transactionRepository,
        UserServiceInterface $userService,
        BalanceServiceInterface $balanceService,
        TransferServiceInterface $transferService
    ) {
        $this->transactionRepository = $transactionRepository;
        $this->userService = $userService;
        $this->balanceService = $balanceService;
        $this->transferService = $transferService;
    }

    /**
     * @inheritDoc
     */
    public function transfer(array $transferData): ?array
    {
        $payerId = $transferData['payer'];
        $this->validatePayer($payerId);
        $this->validateBalance($payerId, $transferData['value']);
        $this->transferService->transfer($transferData);
        return [];
    }


    /**
     * Validar tipo do pagador
     * @param int $payerId
     * @return void
     * @throws \App\Exceptions\StoreTransferException
     */
    private function validatePayer(int $payerId): void
    {
        if (!$this->userService->isUserType($payerId)) {
            throw new StoreTransferException("Lojistas não podem realizar transferências.");
        }
    }

    /**
     * Método para validar saldo
     * @param int   $payerId
     * @param float $transferValue
     * @return void
     * @throws \App\Exceptions\NoFundsException
     */
    private function validateBalance(int $payerId, float $transferValue): void
    {
        if (!$this->balanceService->allowsTransfer($payerId, $transferValue)) {
            throw new NoFundsException("Não há saldo para se realizar a transferência.");
        }
    }
}
