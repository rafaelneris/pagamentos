<?php

namespace App\Services\Users;

use App\Contracts\Users\Mappers\BalanceMapperInterface;
use App\Contracts\Users\Repositories\BalanceRepositoryInterface;
use App\Contracts\Users\Services\BalanceServiceInterface;
use App\Contracts\Users\Services\UserServiceInterface;
use App\Entities\Users\BalanceEntity;
use App\Entities\Users\DepositEntity;

/**
 * Class BalanceService
 * @package App\Services\Users
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class BalanceService implements BalanceServiceInterface
{
    /** @var \App\Contracts\Users\Repositories\BalanceRepositoryInterface */
    private $balanceRepository;

    /** @var \App\Contracts\Users\Services\UserServiceInterface */
    private $userService;

    /** @var \App\Contracts\Users\Mappers\BalanceMapperInterface */
    private $balanceMapper;


    /**
     * BalanceService constructor.
     * @param \App\Contracts\Users\Repositories\BalanceRepositoryInterface $balanceRepository
     * @param \App\Contracts\Users\Services\UserServiceInterface           $userService
     * @param \App\Contracts\Users\Mappers\BalanceMapperInterface          $balanceMapper
     */
    public function __construct(
        BalanceRepositoryInterface $balanceRepository,
        UserServiceInterface $userService,
        BalanceMapperInterface $balanceMapper
    ) {
        $this->balanceRepository = $balanceRepository;
        $this->userService = $userService;
        $this->balanceMapper = $balanceMapper;
    }

    /**
     * @inheritDoc
     */
    public function deposit(DepositEntity $depositEntity): array
    {
        $this->userService->existsUser($depositEntity->getUserId());
        $currentValue = $this->getBalanceValue($depositEntity->getUserId());
        $depositValueSum = $this->sumValuesToDeposit($currentValue, $depositEntity->getValue());
        $balanceData = ['userId' => $depositEntity->getUserId(), 'balance' => $depositValueSum];

        /** @var BalanceEntity $balanceEntity */
        $balanceEntity = $this->balanceMapper->map($balanceData);

        $updatedBalanceEntity = $this->balanceRepository->updateValue($balanceEntity);

        return $this->balanceMapper->revert($updatedBalanceEntity);
    }

    /**
     * Método para somar valores
     * @param float $currentValue
     * @param float $depositValue
     * @return float
     */
    private function sumValuesToDeposit(float $currentValue, float $depositValue)
    {
        return $currentValue + $depositValue;
    }

    /**
     * @inheritDoc
     */
    public function getBalanceValue(string $userId): float
    {
        $userBalanceEntity = $this->balanceRepository->getByUserId($userId);

        if (!isset($userBalanceEntity)) {
            return 0;
        }

        return $userBalanceEntity->getBalance();
    }

    /**
     * @inheritDoc
     */
    public function allowsTransfer(string $userId, float $transferValue): bool
    {
        return ($this->getBalanceValue($userId) - $transferValue) >= 0;
    }

    /**
     * @inheritDoc
     */
    public function withDraw(string $userId, float $value): BalanceEntity
    {
        $withDrawValue = $this->getBalanceValue($userId) - $value;
        /** @var \App\Entities\Users\BalanceEntity $balanceEntity */
        $balanceEntity = $this->makeBalanceEntity($userId, $withDrawValue);

        return $this->balanceRepository->updateValue($balanceEntity);
    }

    /**
     * @param string $userId
     * @param float $value
     * @return \App\Entities\DefaultEntityInterface|mixed
     */
    private function makeBalanceEntity(string $userId, float $value)
    {
        return $this->balanceMapper->map(['userId' => $userId, 'balance' => $value]);
    }
}
