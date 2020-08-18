<?php

namespace App\Services\Transactions\Factories;

use App\Contracts\Transactions\Services\NotifierServiceInterface;
use App\Contracts\Transactions\Services\AuthorizerServiceInterface;
use App\Services\Transactions\TransferService;
use App\Contracts\Users\Mappers\DepositMapperInterface;
use App\Services\Users\BalanceService;

/**
 * Class TransferServiceFactory
 * @package App\Services\Transactions\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransferServiceFactory
{
    /**
     * @return \App\Services\Transactions\TransferService
     */
    public function __invoke(): TransferService
    {
        $balanceService = app(BalanceService::class);
        $authorizerService = app(AuthorizerServiceInterface::class);
        $notifierService = app(NotifierServiceInterface::class);
        $depositMapper = app(DepositMapperInterface::class);

        return new TransferService($balanceService, $authorizerService, $notifierService, $depositMapper);
    }
}
