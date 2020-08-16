<?php

namespace App\Domain\Users\Mappers\Factories;

use App\Domain\Users\Entities\BalanceEntity;
use App\Domain\Users\Mappers\BalanceMapper;

/**
 * Class BalanceMapperFactory
 * @package App\Domain\Users\Mappers\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class BalanceMapperFactory
{
    /**
     * @return \App\Domain\Users\Mappers\BalanceMapper
     */
    public function __invoke()
    {
        $balanceEntity = app(BalanceEntity::class);

        return new BalanceMapper($balanceEntity);
    }
}
