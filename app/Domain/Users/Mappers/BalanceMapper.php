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

    /**
     * @param array $dados
     * @return mixed
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
     * @param \App\Domain\Shared\Contracts\Entities\DefaultEntityInterface $entity
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
