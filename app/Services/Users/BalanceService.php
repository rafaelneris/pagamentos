<?php

namespace App\Services\Users;

use App\Repositories\Contracts\Users\BalanceRepositoryInterface;
use App\Services\Contracts\Users\BalanceServiceInterface;

/**
 * Class BalanceService
 * @package App\Services\Users
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class BalanceService implements BalanceServiceInterface
{
    /** @var \App\Repositories\Contracts\Users\BalanceRepositoryInterface */
    private $balanceRepository;

    /** @var \App\Services\Users\UserService */
    private $userService;

    /**
     * BalanceService constructor.
     * @param \App\Repositories\Contracts\Users\BalanceRepositoryInterface $balanceRepository
     * @param \App\Services\Users\UserService                              $userService
     */
    public function __construct(
        BalanceRepositoryInterface $balanceRepository,
        UserService $userService
    ) {
        $this->balanceRepository = $balanceRepository;
        $this->userService = $userService;
    }

    /**
     * @inheritDoc
     */
    public function deposit(array $depositData)
    {
        $userId = $depositData['userId'];
        $this->userService->existsUser($userId);
        $currentValue = $this->getBalanceValue($userId);
        $depositValueSum = $this->sumValuesToDeposit($currentValue, $depositData['value']);

        return $this->balanceRepository->updateValue($userId, $depositValueSum);
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
    public function getBalanceValue(int $userId)
    {
        $userBalanceModel = $this->balanceRepository->getByUserId($userId);
        return $userBalanceModel['balance'] ?? 0;
    }

    /**
     * @inheritDoc
     */
    public function allowsTransfer(int $userId, int $transferValue): bool
    {
        return ($this->getBalanceValue($userId) - $transferValue) >= 0;
    }

    /**
     * @inheritDoc
     */
    public function withDraw(int $userId, float $value): bool
    {
        $withDrawValue = $this->getBalanceValue($userId) - $value;

        return $this->balanceRepository->updateValue($userId, $withDrawValue);
    }
}
