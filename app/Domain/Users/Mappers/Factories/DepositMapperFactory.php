<?php

namespace App\Domain\Users\Mappers\Factories;

use App\Domain\Users\Entities\DepositEntity;
use App\Domain\Users\Mappers\DepositMapper;

/**
 * Class BalanceMapperFactory
 * @package App\Domain\Users\Mappers\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class DepositMapperFactory
{
    /**
     * @return \App\Domain\Users\Mappers\DepositMapper
     *
     */
    public function __invoke()
    {
        $depositEntity = app(DepositEntity::class);
        return new DepositMapper($depositEntity);
    }
}
