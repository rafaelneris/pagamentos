<?php

namespace App\Domain\Users\Repositories\Factories;

use App\Domain\Users\Contracts\Mappers\BalanceMapperInterface;
use App\Infrastructure\Models\UsersBalance;
use App\Domain\Users\Repositories\BalanceRepository;

/**
 * Class BalanceRepositoryFactory
 * @package App\Domain\Users\Repositories\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class BalanceRepositoryFactory
{
    /**
     * @return \App\Domain\Users\Repositories\BalanceRepository
     */
    public function __invoke(): BalanceRepository
    {
        /** @var UsersBalance $userBalanceModel */
        $userBalanceModel = app(UsersBalance::class);
        $balanceMapper = app(BalanceMapperInterface::class);

        return new BalanceRepository($userBalanceModel, $balanceMapper);
    }
}
