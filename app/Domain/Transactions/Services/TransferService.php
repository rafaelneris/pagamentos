<?php

namespace App\Domain\Transactions\Services;

use App\Domain\Transactions\Contracts\Services\NotifierServiceInterface;
use App\Domain\Transactions\Contracts\Services\AuthorizerServiceInterface;
use App\Domain\Transactions\Contracts\Services\TransferServiceInterface;
use App\Domain\Transactions\Entities\TransactionEntity;
use App\Domain\Users\Contracts\Mappers\DepositMapperInterface;
use App\Domain\Users\Contracts\Services\BalanceServiceInterface;
use App\Domain\Users\Entities\DepositEntity;

/**
 * Class TransferService
 * @package App\Domain\Transactions\Services
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransferService implements TransferServiceInterface
{
    /** @var \App\Domain\Users\Contracts\Services\BalanceServiceInterface */
    private $balanceService;

    /** @var \App\Domain\Transactions\Contracts\Services\AuthorizerServiceInterface */
    private $authorizerService;

    /** @var \App\Domain\Transactions\Contracts\Services\NotifierServiceInterface */
    private $notifierService;

    /** @var \App\Domain\Users\Contracts\Mappers\DepositMapperInterface */
    private $depositMapper;

    /**
     * TransferService constructor.
     * @param \App\Domain\Users\Contracts\Services\BalanceServiceInterface           $balanceService
     * @param \App\Domain\Transactions\Contracts\Services\AuthorizerServiceInterface $authorizerService
     * @param \App\Domain\Transactions\Contracts\Services\NotifierServiceInterface   $notifierService
     * @param \App\Domain\Users\Contracts\Mappers\DepositMapperInterface             $depositMapper
     */
    public function __construct(
        BalanceServiceInterface $balanceService,
        AuthorizerServiceInterface $authorizerService,
        NotifierServiceInterface $notifierService,
        DepositMapperInterface $depositMapper
    ) {
        $this->balanceService = $balanceService;
        $this->authorizerService = $authorizerService;
        $this->notifierService = $notifierService;
        $this->depositMapper = $depositMapper;
    }

    /**
     * @param \App\Domain\Transactions\Entities\TransactionEntity $transactionEntity
     * @throws \App\Application\Exceptions\UserNotFoundException
     */
    public function transfer(TransactionEntity $transactionEntity): void
    {
        $this->balanceService->withDraw($transactionEntity->getPayer(), $transactionEntity->getValue());
        $depositEntity = $this->makeDepositEntity($transactionEntity);
        $this->balanceService->deposit($depositEntity);
        $this->authorizerService->authorize($transactionEntity);
        $this->notifierService->notify($transactionEntity);
    }

    /**
     * @param \App\Domain\Transactions\Entities\TransactionEntity $transactionEntity
     * @return \App\Domain\Shared\Contracts\Entities\DefaultEntityInterface|mixed
     */
    private function makeDepositEntity(TransactionEntity $transactionEntity): DepositEntity
    {
        $deposit = [
            'userId' => $transactionEntity->getPayee(),
            'value' => $transactionEntity->getValue()
        ];

        return $this->depositMapper->map($deposit);
    }
}
