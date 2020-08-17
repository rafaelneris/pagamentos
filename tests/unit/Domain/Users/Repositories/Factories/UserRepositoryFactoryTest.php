<?php

namespace Tests\Domain\Users\Repositories\Factories;

use App\Domain\Users\Contracts\Repositories\UserRepositoryInterface;
use App\Domain\Users\Repositories\Factories\UserRepositoryFactory;
use Tests\TestCase;

/**
 * Class UserRepositoryFactoryTest
 * @package Tests\Domain\Users\Repositories\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserRepositoryFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $userRepository = (new UserRepositoryFactory())();
        $this->assertInstanceOf(UserRepositoryInterface::class, $userRepository);
    }
}
