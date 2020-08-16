<?php

namespace App\Interfaces\Http\Controllers\Factories\Users;

use App\Domain\Users\Contracts\Mappers\DepositMapperInterface;
use App\Interfaces\Http\Controllers\Users\BalanceController;
use App\Domain\Users\Contracts\Services\BalanceServiceInterface;

/**
 * Class BalanceControllerFactory
 * @package App\Interfaces\Http\Controllers\Factories\Users
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class BalanceControllerFactory
{

    /**
     * @return \App\Interfaces\Http\Controllers\Users\BalanceController
     */
    public function __invoke()
    {
        $balanceService = app(BalanceServiceInterface::class);
        $depositMapper = app(DepositMapperInterface::class);

        return new BalanceController($balanceService, $depositMapper);
    }
}
