<?php

namespace App\Services\Transactions;

use App\Contracts\Transactions\Services\NotifierServiceInterface;
use App\Contracts\Transactions\Services\AuthorizerServiceInterface;
use App\Contracts\Transactions\Services\TransferServiceInterface;
use App\Entities\Transactions\TransactionEntity;
use App\Contracts\Users\Mappers\DepositMapperInterface;
use App\Contracts\Users\Services\BalanceServiceInterface;
use App\Entities\Users\DepositEntity;

/**
 * Class TransferService
 * @package App\Services\Transactions
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransferService implements TransferServiceInterface
{
    /** @var \App\Contracts\Users\Services\BalanceServiceInterface */
    private $balanceService;

    /** @var \App\Contracts\Transactions\Services\AuthorizerServiceInterface */
    private $authorizerService;

    /** @var \App\Contracts\Transactions\Services\NotifierServiceInterface */
    private $notifierService;

    /** @var \App\Contracts\Users\Mappers\DepositMapperInterface */
    private $depositMapper;

    /**
     * TransferService constructor.
     * @param \App\Contracts\Users\Services\BalanceServiceInterface           $balanceService
     * @param \App\Contracts\Transactions\Services\AuthorizerServiceInterface $authorizerService
     * @param \App\Contracts\Transactions\Services\NotifierServiceInterface   $notifierService
     * @param \App\Contracts\Users\Mappers\DepositMapperInterface             $depositMapper
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
     * @param \App\Entities\Transactions\TransactionEntity $transactionEntity
     * @throws \App\Exceptions\UserNotFoundException
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
     * @param \App\Entities\Transactions\TransactionEntity $transactionEntity
     * @return \App\Entities\DefaultEntityInterface|mixed
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
