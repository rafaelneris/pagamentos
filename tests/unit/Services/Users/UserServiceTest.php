<?php

namespace Tests\Services\Users;

use App\Exceptions\UserNotFoundException;
use App\Contracts\Users\Repositories\UserRepositoryInterface;
use App\Entities\Users\UserEntity;
use App\Services\Users\UserService;
use Tests\TestCase;

/**
 * Class UserServiceTest
 * @package Tests\Services\Users
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserServiceTest extends TestCase
{

    private $userRepository;

    private $userEntity;

    public function setUp(): void
    {
        parent::setUp();
        $this->configureDependencies();
    }

    public function testRegister()
    {
        $userRepository = clone $this->userRepository;
        $userEntity = clone $this->userEntity;

        $userRepository->method('register')->willReturn(
            [
                'id' => '0abcdd94-5cfe-49f2-b64a-16e4e90eb585',
                'name' => 'Teste ABC',
                'document' => '784.882.590-69',
                'type' => 'user',
                'email' => 'joao@teste.com.br'
            ]
        );
        $userEntity->method('setId')->willReturn($userEntity);

        $userService = new UserService($userRepository);
        $dataReturn = $userService->register($userEntity);

        $this->assertEquals(
            [
                'id' => '0abcdd94-5cfe-49f2-b64a-16e4e90eb585',
                'name' => 'Teste ABC',
                'document' => '784.882.590-69',
                'type' => 'user',
                'email' => 'joao@teste.com.br'
            ],
            $dataReturn
        );
    }

    public function testExistsUser()
    {
        $userRepository = clone $this->userRepository;
        $userRepository->method('findById')->willReturn(
            [
                'id' => '0abcdd94-5cfe-49f2-b64a-16e4e90eb585',
                'name' => 'Teste ABC',
                'document' => '784.882.590-69',
                'type' => 'user',
                'email' => 'joao@teste.com.br'
            ]
        );

        $userService = new UserService($userRepository);
        $return = $userService->existsUser('0abcdd94-5cfe-49f2-b64a-16e4e90eb585');
        $this->assertNull($return);
    }

    public function testExistsUserError()
    {
        $this->expectException(UserNotFoundException::class);
        $userRepository = clone $this->userRepository;
        $userRepository->method('findById')->willReturn(
            null
        );

        $userService = new UserService($userRepository);
        $userService->existsUser('0abcdd94-5cfe-49f2-b64a-16e4e90eb585');
    }


    public function testFindById()
    {
        $userRepository = clone $this->userRepository;

        $userRepository->method('findById')->willReturn(
            [
                'id' => '0abcdd94-5cfe-49f2-b64a-16e4e90eb585',
                'name' => 'Teste ABC',
                'document' => '784.882.590-69',
                'type' => 'user',
                'email' => 'joao@teste.com.br'
            ]
        );
        $userService = new UserService($userRepository);
        $dataReturn = $userService->findById('0abcdd94-5cfe-49f2-b64a-16e4e90eb585');
        $this->assertEquals([
                                'id' => '0abcdd94-5cfe-49f2-b64a-16e4e90eb585',
                                'name' => 'Teste ABC',
                                'document' => '784.882.590-69',
                                'type' => 'user',
                                'email' => 'joao@teste.com.br'
                            ], $dataReturn );
    }

    public function testIsUserType()
    {
        $userRepository = clone $this->userRepository;

        $userRepository->method('findById')->willReturn(
            [
                'id' => '0abcdd94-5cfe-49f2-b64a-16e4e90eb585',
                'name' => 'Teste ABC',
                'document' => '784.882.590-69',
                'type' => 'user',
                'email' => 'joao@teste.com.br'
            ]
        );

        $userService = new UserService($userRepository);
        $dataReturn = $userService->isUserType('0abcdd94-5cfe-49f2-b64a-16e4e90eb585');
        $this->assertTrue($dataReturn);
    }

    private function configureDependencies()
    {
        $this->userRepository = $this->createMock(UserRepositoryInterface::class);
        $this->userEntity = $this->createMock(UserEntity::class);
    }
}
