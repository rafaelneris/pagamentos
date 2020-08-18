<?php

namespace App\Mappers\Users\Factories;

use App\Mappers\Users\UserMapper;
use App\Entities\Users\UserEntity;

/**
 * Class UserMapperFactory
 * @package App\Mappers\Users\Factories
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
