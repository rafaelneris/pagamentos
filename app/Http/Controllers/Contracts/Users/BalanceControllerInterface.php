<?php


namespace App\Http\Controllers\Contracts\Users;

use App\Http\Requests\Users\DepositBalanceRequest;

/**
 * Interface BalanceControllerInterface
 * @package App\Http\Controllers\Contracts\Users
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface BalanceControllerInterface
{
    /**
     * @param \App\Http\Requests\Users\DepositBalanceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deposit(DepositBalanceRequest $request);
}
