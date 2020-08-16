<?php

namespace App\Domain\Users\Services;

use App\Domain\Users\Contracts\Mappers\BalanceMapperInterface;
use App\Domain\Users\Contracts\Repositories\BalanceRepositoryInterface;
use App\Domain\Users\Contracts\Services\BalanceServiceInterface;
use App\Domain\Users\Entities\BalanceEntity;
use App\Domain\Users\Entities\DepositEntity;

/**
 * Class BalanceService
 * @package App\Domain\Users\Services
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class BalanceService implements BalanceServiceInterface
{
    /** @var \App\Domain\Users\Contracts\Repositories\BalanceRepositoryInterface */
    private $balanceRepository;

    /** @var \App\Domain\Users\Services\UserService */
    private $userService;

    /** @var \App\Domain\Users\Contracts\Mappers\BalanceMapperInterface */
    private $balanceMapper;


    /**
     * BalanceService constructor.
     * @param \App\Domain\Users\Contracts\Repositories\BalanceRepositoryInterface $balanceRepository
     * @param \App\Domain\Users\Services\UserService                              $userService
     * @param \App\Domain\Users\Contracts\Mappers\BalanceMapperInterface          $balanceMapper
     */
    public function __construct(
        BalanceRepositoryInterface $balanceRepository,
        UserService $userService,
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
        /** @var \App\Domain\Users\Entities\BalanceEntity $balanceEntity */
        $balanceEntity = $this->makeBalanceEntity($userId, $withDrawValue);

        return $this->balanceRepository->updateValue($balanceEntity);
    }

    /**
     * @param string $userId
     * @param float $value
     * @return \App\Domain\Shared\Contracts\Entities\DefaultEntityInterface|mixed
     */
    private function makeBalanceEntity(string $userId, float $value)
    {
        return $this->balanceMapper->map(['userId' => $userId, 'balance' => $value]);
    }
}
