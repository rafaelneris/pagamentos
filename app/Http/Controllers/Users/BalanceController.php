<?php

namespace App\Http\Controllers\Users;

use App\Exceptions\UserNotFoundException;
use App\Http\Controllers\Contracts\Users\BalanceControllerInterface;
use App\Http\Requests\Users\DepositBalanceRequest;
use App\Services\Contracts\Users\BalanceServiceInterface;
use Fig\Http\Message\StatusCodeInterface;

/**
 * Class BalanceController
 * @package App\Http\Controllers\Users
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class BalanceController implements BalanceControllerInterface
{
    /**
     * @var \App\Services\Contracts\Users\BalanceServiceInterface
     */
    private $balanceService;

    /**
     * BalanceController constructor.
     * @param \App\Services\Contracts\Users\BalanceServiceInterface $balanceService
     */
    public function __construct(BalanceServiceInterface $balanceService)
    {
        $this->balanceService = $balanceService;
    }

    /**
     * @inheritDoc
     * @throws \App\Exceptions\UserNotFoundException
     */
    public function deposit(DepositBalanceRequest $request)
    {
            $depositData = $request->all();
            $this->balanceService->deposit($depositData);
            return response()->json(
                ['message' => 'Deposito realizado com sucesso!'],
                StatusCodeInterface::STATUS_OK
            );
    }
}
