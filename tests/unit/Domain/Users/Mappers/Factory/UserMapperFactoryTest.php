<?php

namespace Tests\Domain\Users\Mappers\Factory;

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
