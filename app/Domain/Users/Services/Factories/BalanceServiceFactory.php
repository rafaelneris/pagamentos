<?php

namespace App\Domain\Users\Services\Factories;

use App\Domain\Users\Contracts\Mappers\BalanceMapperInterface;
use App\Domain\Users\Contracts\Repositories\BalanceRepositoryInterface;
use App\Domain\Users\Contracts\Services\UserServiceInterface;
use App\Domain\Users\Services\BalanceService;

/**
 * Class BalanceServiceFactory
 * @package App\Domain\Users\Services\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class BalanceServiceFactory
{
    /**
     * @return \App\Domain\Users\Services\BalanceService
     */
    public function __invoke(): BalanceService
    {
        $balanceRepository = app(BalanceRepositoryInterface::class);
        $userService = app(UserServiceInterface::class);
        $balanceEntity = app(BalanceMapperInterface::class);

        return new BalanceService($balanceRepository, $userService, $balanceEntity);
    }
}
