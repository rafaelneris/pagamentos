<?php

namespace App\Mappers;

use App\Entities\DefaultEntityInterface;

/**
 * Interface DefaultMapperInterface
 * @package App\Mappers
 * @author Rafael Neris <rafaelnerisdj@gmail.com
 */
interface DefaultMapperInterface
{
    /**
     * @param array $dados
     * @return \App\Entities\DefaultEntityInterface
     */
    public function map(array $dados): DefaultEntityInterface;

    /**
     * @param DefaultEntityInterface $entity
     * @return array
     */
    public function revert(DefaultEntityInterface $entity): array;
}
