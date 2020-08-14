<?php

namespace App\Services\Factories\Users;

use App\Repositories\Contracts\Users\BalanceRepositoryInterface;
use App\Services\Contracts\Users\UserServiceInterface;
use App\Services\Users\BalanceService;

/**
 * Class BalanceServiceFactory
 * @package App\Services\Factories\Users
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class BalanceServiceFactory
{

    /**
     * @return \App\Services\Users\BalanceService
     */
    public function __invoke()
    {
        $balanceRepository = app(BalanceRepositoryInterface::class);
        $userService = app(UserServiceInterface::class);

        return new BalanceService($balanceRepository, $userService);
    }

}
