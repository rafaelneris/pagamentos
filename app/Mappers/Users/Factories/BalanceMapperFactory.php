<?php

namespace App\Mappers\Users\Factories;

use App\Entities\Users\BalanceEntity;
use App\Mappers\Users\BalanceMapper;

/**
 * Class BalanceMapperFactory
 * @package App\Mappers\Users\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class BalanceMapperFactory
{
    /**
     * @return \App\Mappers\Users\BalanceMapper
     */
    public function __invoke()
    {
        $balanceEntity = app(BalanceEntity::class);

        return new BalanceMapper($balanceEntity);
    }
}
