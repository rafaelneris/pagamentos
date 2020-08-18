<?php

namespace App\Mappers\Users;

use App\Entities\DefaultEntityInterface;
use App\Mappers\DefaultMapper;
use App\Contracts\Users\Mappers\DepositMapperInterface;

/**
 * Class BalanceMapper
 * @package App\Mappers\Users
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class DepositMapper extends DefaultMapper implements DepositMapperInterface
{
    /** @var \App\Entities\Users\DepositEntity */
    protected $entity;

    /**
     * @param array $dados
     * @return \App\Entities\Users\DepositEntity
     */
    public function map(array $dados): DefaultEntityInterface
    {
        /** @var \App\Entities\Users\DepositEntity $entity */
        $entity = clone $this->entity;
        $entity
            ->setUserId($dados['userId'])
            ->setValue($dados['value']);
        return $entity;
    }

    /**
     * @param \App\Entities\Users\DepositEntity $entity
     * @return array
     */
    public function revert(DefaultEntityInterface $entity): array
    {
        return [
            'userId' => $entity->getUserId(),
            'value' => $entity->getValue()
        ];
    }
}
