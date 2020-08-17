<?php

namespace Tests\Domain\Transactions\Services\Factories;

use App\Domain\Transactions\Contracts\Services\TransferServiceInterface;
use App\Domain\Transactions\Services\Factories\TransferServiceFactory;
use Tests\TestCase;

class TransferServiceFactoryTest extends TestCase
{
    public function testFactory()
    {
        $transferService = (new TransferServiceFactory())();
        $this->assertInstanceOf(TransferServiceInterface::class, $transferService);
    }

}
