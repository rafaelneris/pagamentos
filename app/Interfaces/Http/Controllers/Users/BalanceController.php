<?php

namespace App\Interfaces\Http\Controllers\Users;

use App\Domain\Users\Contracts\Mappers\DepositMapperInterface;
use App\Interfaces\Http\Controllers\Contracts\Users\BalanceControllerInterface;
use App\Application\Requests\Users\DepositBalanceRequest;
use App\Domain\Users\Contracts\Services\BalanceServiceInterface;
use Fig\Http\Message\StatusCodeInterface;

/**
 * Class BalanceController
 * @package App\Interfaces\Http\Controllers\Users
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class BalanceController implements BalanceControllerInterface
{
    /** @var \App\Domain\Users\Contracts\Services\BalanceServiceInterface */
    private $balanceService;

    /** @var \App\Domain\Users\Contracts\Mappers\DepositMapperInterface */
    private $depositMapper;

    /**
     * BalanceController constructor.
     * @param \App\Domain\Users\Contracts\Services\BalanceServiceInterface $balanceService
     * @param \App\Domain\Users\Contracts\Mappers\DepositMapperInterface   $depositMapper
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
     * @throws \App\Application\Exceptions\UserNotFoundException
     */
    public function deposit(DepositBalanceRequest $request)
    {
        $depositData = $request->all();
        /** @var \App\Domain\Users\Entities\DepositEntity $depositEntity */
        $depositEntity = $this->depositMapper->map($depositData);

        $balanceData = $this->balanceService->deposit($depositEntity);
        return response()->json(
            $balanceData,
            StatusCodeInterface::STATUS_OK
        );
    }
}
