<?php


namespace App\Interfaces\Http\Controllers\Contracts\Users;

use App\Application\Requests\Users\DepositBalanceRequest;

/**
 * Interface BalanceControllerInterface
 * @package App\Interfaces\Http\Controllers\Contracts\Users
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface BalanceControllerInterface
{
    /**
     * @param \App\Application\Requests\Users\DepositBalanceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deposit(DepositBalanceRequest $request);
}
