<?php

namespace Tests\Domain\Transactions\Services\Factories;

use App\Domain\Transactions\Contracts\Services\TransferServiceInterface;
use App\Domain\Transactions\Contracts\Services\ValidatorServiceInterface;
use App\Domain\Transactions\Entities\TransactionEntity;
use App\Domain\Transactions\Services\Factories\TransferServiceFactory;
use App\Domain\Transactions\Services\Factories\ValidatorServiceFactoryMethod;
use Tests\TestCase;

/**
 * Class ValidatorServiceFactoryMethodTest
 * @package Tests\Domain\Transactions\Services\Factories
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
