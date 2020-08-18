<?php

namespace App\Mappers\Users;

use App\Entities\DefaultEntityInterface;
use App\Mappers\DefaultMapper;
use App\Contracts\Users\Mappers\BalanceMapperInterface;

/**
 * Class BalanceMapper
 * @package App\Mappers\Users
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class BalanceMapper extends DefaultMapper implements BalanceMapperInterface
{
    /** @var \App\Entities\Users\BalanceEntity */
    protected $entity;

    /**
     * @param array $dados
     * @return \App\Entities\Users\BalanceEntity
     */
    public function map(array $dados): DefaultEntityInterface
    {
        /** @var \App\Entities\Users\BalanceEntity $entity */
        $entity = clone $this->entity;
        $entity
            ->setUserId($dados['userId'])
            ->setBalance($dados['balance']);
        return $entity;
    }

    /**
     * @param \App\Entities\Users\BalanceEntity $entity
     * @return array
     */
    public function revert(DefaultEntityInterface $entity): array
    {
        return [
            'userId' => $entity->getUserId(),
            'balance' => $entity->getBalance()
        ];
    }
}
