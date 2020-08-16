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
     * @return mixed
     */
    public function map(array $dados): DefaultEntityInterface;

    /**
     * @param $entity
     * @return array
     */
    public function revert(DefaultEntityInterface $entity): array;
}
