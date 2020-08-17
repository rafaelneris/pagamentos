<?php

namespace App\Domain\Users\Mappers;

use App\Domain\Shared\Contracts\Entities\DefaultEntityInterface;
use App\Domain\Shared\Mapper\DefaultMapper;
use App\Domain\Users\Contracts\Mappers\DepositMapperInterface;

/**
 * Class BalanceMapper
 * @package App\Domain\Users\Mappers
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class DepositMapper extends DefaultMapper implements DepositMapperInterface
{
    /** @var \App\Domain\Users\Entities\DepositEntity */
    protected $entity;

    /**
     * @param array $dados
     * @return \App\Domain\Users\Entities\DepositEntity
     */
    public function map(array $dados): DefaultEntityInterface
    {
        /** @var \App\Domain\Users\Entities\DepositEntity $entity */
        $entity = clone $this->entity;
        $entity
            ->setUserId($dados['userId'])
            ->setValue($dados['value']);
        return $entity;
    }

    /**
     * @param \App\Domain\Users\Entities\DepositEntity $entity
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
