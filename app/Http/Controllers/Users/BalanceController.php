<?php

namespace App\Http\Controllers\Users;

use App\Contracts\Users\Mappers\DepositMapperInterface;
use App\Http\Controllers\Contracts\Users\BalanceControllerInterface;
use App\Http\Requests\Users\DepositBalanceRequest;
use App\Contracts\Users\Services\BalanceServiceInterface;
use Fig\Http\Message\StatusCodeInterface;

/**
 * Class BalanceController
 * @package App\Http\Controllers\Users
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class BalanceController implements BalanceControllerInterface
{
    /** @var \App\Contracts\Users\Services\BalanceServiceInterface */
    private $balanceService;

    /** @var \App\Contracts\Users\Mappers\DepositMapperInterface */
    private $depositMapper;

    /**
     * BalanceController constructor.
     * @param \App\Contracts\Users\Services\BalanceServiceInterface $balanceService
     * @param \App\Contracts\Users\Mappers\DepositMapperInterface   $depositMapper
     */
    public function __construct(
        BalanceServiceInterface $balanceService,
        DepositMapperInterface $depositMapper
    ) {
        $this->balanceService = $balanceService;
        $this->depositMapper = $depositMapper;
    }

    /**
     * @inheritDoc
     * @throws \App\Exceptions\UserNotFoundException
     */
    public function deposit(DepositBalanceRequest $request)
    {
        $depositData = $request->all();
        /** @var \App\Entities\Users\DepositEntity $depositEntity */
        $depositEntity = $this->depositMapper->map($depositData);

        $balanceData = $this->balanceService->deposit($depositEntity);
        return response()->json(
            $balanceData,
            StatusCodeInterface::STATUS_OK
        );
    }
}
