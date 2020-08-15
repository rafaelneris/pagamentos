<?php

namespace App\Repositories\Eloquent;

use App\Models\UsersBalance;
use App\Repositories\Contracts\Users\BalanceRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class BalanceRepository
 * @package App\Repositories\Eloquent
 * @author  <rafaelnerisdj@gmail.com>
 */
class BalanceRepository implements BalanceRepositoryInterface
{
    /** @var \App\Models\UsersBalance */
    private UsersBalance $usersBalance;

    /** @var \Illuminate\Database\Eloquent\Builder */
    private Builder $queryBuilder;

    /**
     * BalanceRepository constructor.
     * @param \App\Models\UsersBalance $usersBalance
     */
    public function __construct(UsersBalance $usersBalance)
    {
        $this->usersBalance = $usersBalance;

        /** @var \Illuminate\Database\Eloquent\Builder $queryBuilder */
        $this->queryBuilder = $this->usersBalance->newQuery();
    }

    /**
     * @inheritDoc
     */
    public function updateValue(int $userId, float $value)
    {
        $queryBuilder = clone $this->queryBuilder;
        /** @var \Illuminate\Database\Eloquent\Model $balanceModel */
        $queryBuilder->updateOrInsert(['userId' => $userId], ['balance' => $value]);
        return true;
    }

    /**
     * @inheritDoc
     */
    public function getByUserId(int $userId)
    {
        $queryBuilder = clone $this->queryBuilder;
        $userBalanceModel = $queryBuilder->find($userId);
        return !empty($userBalanceModel) ? $userBalanceModel->toArray() : null;
    }
}
