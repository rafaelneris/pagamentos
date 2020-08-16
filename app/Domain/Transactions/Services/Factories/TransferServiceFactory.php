<?php

namespace App\Domain\Transactions\Services\Factories;

use App\Domain\Transactions\Contracts\Services\NotifierServiceInterface;
use App\Domain\Transactions\Contracts\Services\AuthorizerServiceInterface;
use App\Domain\Transactions\Services\TransferService;
use App\Domain\Users\Contracts\Mappers\DepositMapperInterface;
use App\Domain\Users\Services\BalanceService;

/**
 * Class TransferServiceFactory
 * @package App\Domain\Transactions\Services\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransferServiceFactory
{
    /**
     * @return \App\Domain\Transactions\Services\TransferService
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
