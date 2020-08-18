<?php

namespace Tests\Mappers\Users;

use App\Contracts\Users\Services\UserServiceInterface;
use App\Entities\Users\UserEntity;
use App\Mappers\Users\UserMapper;

/**
 * Class UserMapperTest
 * @package Tests\Mappers\Users
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserMapperTest extends \PHPUnit_Framework_TestCase
{
    private $userEntity;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stubs
        $this->setUpDependencies();
    }

    /**
     * @dataProvider provideDepositData
     */
    public function testMap($userData, $userEntityExpected)
    {
        $userMapper = new UserMapper(new UserEntity());
        $userEntity = $userMapper->map($userData);
        $this->assertEquals($userEntityExpected, $userEntity);
    }

    /**
     * @dataProvider provideDepositData
     */
    public function testRevert($userDataExpected, $userEntity)
    {
        $userMapper = new UserMapper(new UserEntity());
        $userData = $userMapper->revert($userEntity);
        $this->assertEquals($userDataExpected, $userData);
    }

    public function provideDepositData()
    {
        $userEntity = $this->makeEntity();
        return [
            [
                [
                    'id' => '0abcdd94-5cfe-49f2-b64a-16e4e90eb585',
                    'name' => 'Teste ABC',
                    'document' => '784.882.590-69',
                    'type' => 'user',
                    'email' => 'joao@teste.com.br'
                ],
                $userEntity
            ]
        ];
    }

    private function setUpDependencies()
    {
        $userEntity = $this->makeEntity();
        $this->userEntity = $this->createMock(UserEntity::class);
        $this->userEntity
            ->method('setId')->willReturn($userEntity);
        $this->userEntity
            ->method('setEmail')->willReturn($userEntity);
        $this->userEntity
            ->method('setDocument')->willReturn($userEntity);
        $this->userEntity
            ->method('setType')->willReturn($userEntity);
        $this->userEntity
            ->method('setName')->willReturn($userEntity);
    }

    private function makeEntity()
    {
        $userEntity = new UserEntity();
        $userEntity
            ->setId('0abcdd94-5cfe-49f2-b64a-16e4e90eb585')
            ->setName('Teste ABC')
            ->setEmail('joao@teste.com.br')
            ->setDocument('784.882.590-69')
            ->setType(UserServiceInterface::TYPE_USER);
        return $userEntity;
    }
}
