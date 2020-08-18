<?php

namespace App\Services\Users\Factories;

use App\Contracts\Users\Mappers\BalanceMapperInterface;
use App\Contracts\Users\Repositories\BalanceRepositoryInterface;
use App\Contracts\Users\Services\UserServiceInterface;
use App\Services\Users\BalanceService;

/**
 * Class BalanceServiceFactory
 * @package App\Services\Users\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class BalanceServiceFactory
{
    /**
     * @return \App\Services\Users\BalanceService
     */
    public function __invoke(): BalanceService
    {
        $balanceRepository = app(BalanceRepositoryInterface::class);
        $userService = app(UserServiceInterface::class);
        $balanceEntity = app(BalanceMapperInterface::class);

        return new BalanceService($balanceRepository, $userService, $balanceEntity);
    }
}
