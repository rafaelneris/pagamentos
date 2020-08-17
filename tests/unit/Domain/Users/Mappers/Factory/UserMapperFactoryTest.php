<?php

namespace Tests\Domain\Users\Mappers\Factory;

use App\Domain\Users\Contracts\Mappers\UserMapperInterface;
use App\Domain\Users\Mappers\Factories\UserMapperFactory;
use Tests\TestCase;

class UserMapperFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $userMapper = (new UserMapperFactory())();
        $this->assertInstanceOf(UserMapperInterface::class, $userMapper);
    }
}
