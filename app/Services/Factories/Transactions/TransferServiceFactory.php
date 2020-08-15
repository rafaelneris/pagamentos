<?php

namespace App\Services\Factories\Transactions;

use App\Services\Transactions\TransferService;
use App\Services\Users\BalanceService;

/**
 * Class TransferServiceFactory
 * @package App\Services\Factories\Transactions
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransferServiceFactory
{
    public function __invoke()
    {
        $balanceService = app(BalanceService::class);
        return new TransferService($balanceService);
    }
}
