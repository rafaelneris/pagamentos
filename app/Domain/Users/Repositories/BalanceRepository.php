<?php

namespace App\Domain\Users\Repositories;

use App\Domain\Users\Contracts\Mappers\BalanceMapperInterface;
use App\Domain\Users\Entities\BalanceEntity;
use App\Infrastructure\Models\UsersBalance;
use App\Domain\Users\Contracts\Repositories\BalanceRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class BalanceRepository
 * @package App\Repositories\Eloquent
 * @author  <rafaelnerisdj@gmail.com>
 */
class BalanceRepository implements BalanceRepositoryInterface
{
    /** @var \App\Infrastructure\Models\UsersBalance */
    private UsersBalance $usersBalance;

    /** @var \Illuminate\Database\Eloquent\Builder */
    private Builder $queryBuilder;

    /** @var \App\Domain\Users\Contracts\Mappers\BalanceMapperInterface */
    private $balanceMapper;

    /**
     * BalanceRepository constructor.
     * @param \App\Infrastructure\Models\UsersBalance                    $usersBalance
     * @param \App\Domain\Users\Contracts\Mappers\BalanceMapperInterface $balanceMapper
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
        /** @var \App\Domain\Users\Entities\BalanceEntity $balanceEntity */
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
