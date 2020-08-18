<?php

namespace App\Repositories\Users;

use App\Contracts\Users\Mappers\BalanceMapperInterface;
use App\Entities\Users\BalanceEntity;
use App\Model\UsersBalance;
use App\Contracts\Users\Repositories\BalanceRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class BalanceRepository
 * @package App\Repositories\Eloquent
 * @author  <rafaelnerisdj@gmail.com>
 */
class BalanceRepository implements BalanceRepositoryInterface
{
    /** @var \App\Model\UsersBalance */
    private UsersBalance $usersBalance;

    /** @var \Illuminate\Database\Eloquent\Builder */
    private Builder $queryBuilder;

    /** @var \App\Contracts\Users\Mappers\BalanceMapperInterface */
    private $balanceMapper;

    /**
     * BalanceRepository constructor.
     * @param \App\Model\UsersBalance                    $usersBalance
     * @param \App\Contracts\Users\Mappers\BalanceMapperInterface $balanceMapper
     */
    public function __construct(UsersBalance $usersBalance, BalanceMapperInterface $balanceMapper)
    {
        $this->usersBalance = $usersBalance;
        /** @var \Illuminate\Database\Eloquent\Builder $queryBuilder */
        $this->queryBuilder = $this->usersBalance->newQuery();
        $this->balanceMapper = $balanceMapper;
    }

    /**
     * @inheritDoc
     */
    public function updateValue(BalanceEntity $balanceEntity): BalanceEntity
    {
        $queryBuilder = clone $this->queryBuilder;
        $userId = $balanceEntity->getUserId();

        /** @var \Illuminate\Database\Eloquent\Model $balanceModel */
        $balanceModel = $queryBuilder->updateOrCreate(
            ['userId' => $balanceEntity->getUserId()],
            ['balance' => $balanceEntity->getBalance()]
        );
        /** @var \App\Entities\Users\BalanceEntity $balanceEntity */
        $balanceEntity = $this->balanceMapper->map($balanceModel->toArray());
        $balanceEntity->setUserId($userId);
        return $balanceEntity;
    }

    /**
     * @inheritDoc
     */
    public function getByUserId(string $userId): ?BalanceEntity
    {
        $queryBuilder = clone $this->queryBuilder;
        $userBalance = $queryBuilder->find($userId);
        if (isset($userBalance)) {
             /** @var BalanceEntity $balanceEntity */
            $balanceEntity = $this->balanceMapper->map($userBalance->toArray());
            return $balanceEntity;
        }

        return null;
    }
}
