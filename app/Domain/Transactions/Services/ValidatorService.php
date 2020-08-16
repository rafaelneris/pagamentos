<?php

namespace App\Domain\Transactions\Services;

use App\Application\Exceptions\NoFundsException;
use App\Application\Exceptions\StoreTransferException;
use App\Domain\Transactions\Contracts\Services\ValidatorServiceInterface;
use App\Domain\Transactions\Entities\TransactionEntity;
use App\Domain\Users\Contracts\Services\BalanceServiceInterface;
use App\Domain\Users\Contracts\Services\UserServiceInterface;

/**
 * Class ValidatorService
 * @package App\Domain\Transactions\Services
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class ValidatorService implements ValidatorServiceInterface
{
    /** @var \App\Domain\Users\Contracts\Services\UserServiceInterface */
    private $userService;

    /** @var \App\Domain\Users\Contracts\Services\BalanceServiceInterface */
    private $balanceService;
    /**
     * @var \App\Domain\Transactions\Entities\TransactionEntity
     */
    private $transactionEntity;

    /**
     * ValidatorService constructor.
     * @param \App\Domain\Users\Contracts\Services\UserServiceInterface    $userService
     * @param \App\Domain\Users\Contracts\Services\BalanceServiceInterface $balanceService
     * @param \App\Domain\Transactions\Entities\TransactionEntity          $transactionEntity
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
            throw new StoreTransferException("Lojistas não podem realizar transferências.");
        }
    }

    /**
     * @inheritDoc
     */
    public function validateBalance(): void
    {
        if (!$this->balanceService->allowsTransfer(
            $this->transactionEntity->getPayer(),
            $this->transactionEntity->getValue()
        )) {
            throw new NoFundsException("Não há saldo para se realizar a transferência.");
        }
    }
}
