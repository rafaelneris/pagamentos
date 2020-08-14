<?php

namespace App\Services\Users;

use App\Exceptions\UserNotFoundException;
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
        $user = $this->userService->findById($depositData['userId']);

        if (!isset($user)) {
            throw new UserNotFoundException("Usuário não existe");
        }

        $currentValue = $this->getBalanceValue($depositData['userId']);
        $depositValueSum = $this->sumValuesToDeposit($currentValue, $depositData['value']);

        return $this->balanceRepository->updateValue($depositData['userId'], $depositValueSum);
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
     * Método para somar valores
     * @param float $currentValue
     * @param float $depositValue
     * @return float
     */
    private function sumValuesToDeposit(float $currentValue, float $depositValue)
    {
        return $currentValue + $depositValue;
    }
}
