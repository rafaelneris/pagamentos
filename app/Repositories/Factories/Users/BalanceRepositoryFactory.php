<?php

namespace App\Repositories\Factories\Users;

use App\Models\UsersBalance;
use App\Repositories\Eloquent\BalanceRepository;

/**
 * Class BalanceRepositoryFactory
 * @package App\Repositories\Factories\Users
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class BalanceRepositoryFactory
{
    /**
     * @return \App\Repositories\Eloquent\BalanceRepository
     */
    public function __invoke()
    {
        /** @var UsersBalance $userBalanceModel */
        $userBalanceModel = app(UsersBalance::class);

        return new BalanceRepository($userBalanceModel);
    }
}
