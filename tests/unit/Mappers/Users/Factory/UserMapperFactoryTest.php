<?php

namespace Tests\Mappers\Users\Factory;

use App\Contracts\Users\Mappers\UserMapperInterface;
use App\Mappers\Users\Factories\UserMapperFactory;
use Tests\TestCase;

class UserMapperFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $userMapper = (new UserMapperFactory())();
        $this->assertInstanceOf(UserMapperInterface::class, $userMapper);
    }
}
