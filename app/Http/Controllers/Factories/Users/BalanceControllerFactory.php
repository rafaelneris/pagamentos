<?php

namespace App\Http\Controllers\Factories\Users;

use App\Http\Controllers\Users\BalanceController;
use App\Services\Contracts\Users\BalanceServiceInterface;

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
        return new BalanceController($balanceService);
    }

}
