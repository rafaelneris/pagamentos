<?php

namespace Tests\Services\Transactions\Factories;

use App\Contracts\Transactions\Services\TransferServiceInterface;
use App\Contracts\Transactions\Services\ValidatorServiceInterface;
use App\Entities\Transactions\TransactionEntity;
use App\Services\Transactions\Factories\TransferServiceFactory;
use App\Services\Transactions\Factories\ValidatorServiceFactoryMethod;
use Tests\TestCase;

/**
 * Class ValidatorServiceFactoryMethodTest
 * @package Tests\Services\Transactions\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class ValidatorServiceFactoryMethodTest extends TestCase
{
    public function testFactory()
    {
        $validatorServiceFactoryMethod = (new ValidatorServiceFactoryMethod())();
        $this->assertInstanceOf(ValidatorServiceFactoryMethod::class, $validatorServiceFactoryMethod);
    }

    public function testFactoryMethod()
    {
        $entityMock = $this->createMock(TransactionEntity::class);
        $validatorServiceFactoryMethod = (new ValidatorServiceFactoryMethod())();
        $validatorService = $validatorServiceFactoryMethod->factory($entityMock);
        $this->assertInstanceOf(ValidatorServiceInterface::class, $validatorService);
    }
}
