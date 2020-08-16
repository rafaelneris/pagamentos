<?php

namespace App\Domain\Users\Mappers;

use App\Domain\Shared\Contracts\Entities\DefaultEntityInterface;
use App\Domain\Shared\Mapper\DefaultMapper;
use App\Domain\Users\Contracts\Mappers\BalanceMapperInterface;

/**
 * Class BalanceMapper
 * @package App\Domain\Users\Mappers
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class BalanceMapper extends DefaultMapper implements BalanceMapperInterface
{
    /** @var \App\Domain\Users\Entities\BalanceEntity */
    protected $entity;

    /**
     * @param array $dados
     * @return \App\Domain\Users\Entities\BalanceEntity
     */
    public function map(array $dados): DefaultEntityInterface
    {
        /** @var \App\Domain\Users\Entities\BalanceEntity $entity */
        $entity = clone $this->entity;
        $entity
            ->setUserId($dados['userId'])
            ->setBalance($dados['balance']);
        return $entity;
    }

    /**
     * @param \App\Domain\Users\Entities\BalanceEntity $entity
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
