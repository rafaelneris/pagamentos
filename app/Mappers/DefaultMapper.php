<?php

namespace App\Mappers;

use App\Entities\DefaultEntityInterface;

/**
 * Class DefaultMapper
 * @package App\Mappers
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
abstract class DefaultMapper
{
    /**
     * @var \App\Entities\DefaultEntityInterface
     */
    protected $entity;

    /**
     * DefaultMapper constructor.
     * @param \App\Entities\DefaultEntityInterface $entity
     */
    public function __construct(DefaultEntityInterface $entity)
    {
        $this->entity = $entity;
    }
}
