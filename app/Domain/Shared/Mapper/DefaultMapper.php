<?php

namespace App\Domain\Shared\Mapper;

use App\Domain\Shared\Contracts\Entities\DefaultEntityInterface;

/**
 * Class DefaultMapper
 * @package App\Domain\Shared\Mapper
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
abstract class DefaultMapper
{
    /**
     * @var \App\Domain\Shared\Contracts\Entities\DefaultEntityInterface
     */
    protected $entity;

    /**
     * DefaultMapper constructor.
     * @param \App\Domain\Shared\Contracts\Entities\DefaultEntityInterface $entity
     */
    public function __construct(DefaultEntityInterface $entity)
    {
        $this->entity = $entity;
    }
}
