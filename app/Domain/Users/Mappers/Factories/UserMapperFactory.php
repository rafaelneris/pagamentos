<?php

namespace App\Domain\Users\Mappers\Factories;

use App\Domain\Users\Mappers\UserMapper;
use App\Domain\Users\Entities\UserEntity;

/**
 * Class UserMapperFactory
 * @package App\Domain\Users\Mappers\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserMapperFactory
{
    public function __invoke(): UserMapper
    {
        $userEntity = app(UserEntity::class);
        return new UserMapper($userEntity);
    }
}
