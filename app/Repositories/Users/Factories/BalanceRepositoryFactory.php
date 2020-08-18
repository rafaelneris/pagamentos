<?php

namespace App\Repositories\Users\Factories;

use App\Contracts\Users\Mappers\BalanceMapperInterface;
use App\Model\UsersBalance;
use App\Repositories\Users\BalanceRepository;

/**
 * Class BalanceRepositoryFactory
 * @package App\Repositories\Users\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class BalanceRepositoryFactory
{
    /**
     * @return \App\Repositories\Users\BalanceRepository
     */
    public function __invoke(): BalanceRepository
    {
        /** @var UsersBalance $userBalanceModel */
        $userBalanceModel = app(UsersBalance::class);
        $balanceMapper = app(BalanceMapperInterface::class);

        return new BalanceRepository($userBalanceModel, $balanceMapper);
    }
}
