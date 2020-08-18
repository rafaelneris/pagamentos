<?php

namespace App\Services\Transactions;

use App\Exceptions\NoFundsException;
use App\Exceptions\PayerEqualsPayeeException;
use App\Exceptions\StoreTransferException;
use App\Contracts\Transactions\Services\ValidatorServiceInterface;
use App\Entities\Transactions\TransactionEntity;
use App\Contracts\Users\Services\BalanceServiceInterface;
use App\Contracts\Users\Services\UserServiceInterface;

/**
 * Class ValidatorService
 * @package App\Services\Transactions
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class ValidatorService implements ValidatorServiceInterface
{
    /** @var \App\Contracts\Users\Services\UserServiceInterface */
    private $userService;

    /** @var \App\Contracts\Users\Services\BalanceServiceInterface */
    private $balanceService;
    /**
     * @var \App\Entities\Transactions\TransactionEntity
     */
    private $transactionEntity;

    /**
     * ValidatorService constructor.
     * @param \App\Contracts\Users\Services\UserServiceInterface    $userService
     * @param \App\Contracts\Users\Services\BalanceServiceInterface $balanceService
     * @param \App\Entities\Transactions\TransactionEntity          $transactionEntity
     */
    public function __construct(
        UserServiceInterface $userService,
        BalanceServiceInterface $balanceService,
        TransactionEntity $transactionEntity
    ) {
        $this->userService = $userService;
        $this->balanceService = $balanceService;
        $this->transactionEntity = $transactionEntity;
    }

    /**
     * @inheritDoc
     */
    public function validatePayer(): void
    {
        if (!$this->userService->isUserType($this->transactionEntity->getPayer())) {
            throw new StoreTransferException("Lojistas não podem realizar transferências.");
        }
    }

    /**
     * @inheritDoc
     */
    public function validateActors(): void
    {
        $this->userService->existsUser($this->transactionEntity->getPayer());
        $this->userService->existsUser($this->transactionEntity->getPayee());
    }

    /**
     * @inheritDoc
     */
    public function validatePayerEqualsPayee(): void
    {
        if ($this->transactionEntity->getPayer() === $this->transactionEntity->getPayee()) {
            throw new PayerEqualsPayeeException("Lojistas não podem realizar transferências.");
        }
    }

    /**
     * @inheritDoc
     */
    public function validateBalance(): void
    {
        if (
            !$this->balanceService->allowsTransfer(
                $this->transactionEntity->getPayer(),
                $this->transactionEntity->getValue()
            )
        ) {
            throw new NoFundsException("Não há saldo para se realizar a transferência.");
        }
    }
}
