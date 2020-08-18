<?php

namespace App\Http\Controllers\Factories\Users;

use App\Contracts\Users\Mappers\DepositMapperInterface;
use App\Http\Controllers\Users\BalanceController;
use App\Contracts\Users\Services\BalanceServiceInterface;

/**
 * Class BalanceControllerFactory
 * @package App\Http\Controllers\Factories\Users
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class BalanceControllerFactory
{

    /**
     * @return \App\Http\Controllers\Users\BalanceController
     */
    public function __invoke()
    {
        $balanceService = app(BalanceServiceInterface::class);
        $depositMapper = app(DepositMapperInterface::class);

        return new BalanceController($balanceService, $depositMapper);
    }
}
