<?php

namespace App\Domain\Shared\Contracts\Mappers;

use App\Domain\Shared\Contracts\Entities\DefaultEntityInterface;

/**
 * Interface DefaultMapperInterface
 * @package App\Mappers
 * @author Rafael Neris <rafaelnerisdj@gmail.com
 */
interface DefaultMapperInterface
{
    /**
     * @param array $dados
     * @return \App\Domain\Shared\Contracts\Entities\DefaultEntityInterface
     */
    public function map(array $dados): DefaultEntityInterface;

    /**
     * @param DefaultEntityInterface $entity
     * @return array
     */
    public function revert(DefaultEntityInterface $entity): array;
}
