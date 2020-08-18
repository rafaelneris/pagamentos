<?php

namespace App\Services\Transactions\Factories;

use App\Contracts\Transactions\Services\ValidatorFactoryMethodInterface;
use App\Contracts\Transactions\Services\ValidatorServiceInterface;
use App\Entities\Transactions\TransactionEntity;
use App\Services\Transactions\ValidatorService;
use App\Contracts\Users\Services\BalanceServiceInterface;
use App\Contracts\Users\Services\UserServiceInterface;

/**
 * Class ValidatorServiceFactoryMethod
 * @package App\Services\Transactions\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class ValidatorServiceFactoryMethod implements ValidatorFactoryMethodInterface
{
    /**
     * @return $this
     */
    public function __invoke(): ValidatorFactoryMethodInterface
    {
        return $this;
    }

    /**
     * @param \App\Entities\Transactions\TransactionEntity $transactionEntity
     * @return \App\Contracts\Transactions\Services\ValidatorServiceInterface
     */
    public function factory(TransactionEntity $transactionEntity): ValidatorServiceInterface
    {
        /** @var UserServiceInterface $userService */
        $userService = app(UserServiceInterface::class);

        /** @var BalanceServiceInterface $balanceService */
        $balanceService = app(BalanceServiceInterface::class);

        return new ValidatorService($userService, $balanceService, $transactionEntity);
    }
}
