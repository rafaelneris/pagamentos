<?php

namespace App\Mappers\Users\Factories;

use App\Entities\Users\DepositEntity;
use App\Mappers\Users\DepositMapper;

/**
 * Class BalanceMapperFactory
 * @package App\Mappers\Users\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class DepositMapperFactory
{
    /**
     * @return \App\Mappers\Users\DepositMapper
     *
     */
    public function __invoke()
    {
        $depositEntity = app(DepositEntity::class);
        return new DepositMapper($depositEntity);
    }
}
