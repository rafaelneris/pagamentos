<?php

namespace App\Domain\Transactions\Services\Factories;

use App\Domain\Transactions\Contracts\Services\ValidatorFactoryMethodInterface;
use App\Domain\Transactions\Contracts\Services\ValidatorServiceInterface;
use App\Domain\Transactions\Entities\TransactionEntity;
use App\Domain\Transactions\Services\ValidatorService;
use App\Domain\Users\Contracts\Services\BalanceServiceInterface;
use App\Domain\Users\Contracts\Services\UserServiceInterface;

/**
 * Class ValidatorServiceFactoryMethod
 * @package App\Domain\Transactions\Services\Factories
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
     * @param \App\Domain\Transactions\Entities\TransactionEntity $transactionEntity
     * @return \App\Domain\Transactions\Contracts\Services\ValidatorServiceInterface
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
