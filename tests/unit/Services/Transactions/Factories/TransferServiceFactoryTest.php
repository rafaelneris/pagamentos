<?php

namespace Tests\Services\Transactions\Factories;

use App\Contracts\Transactions\Services\TransferServiceInterface;
use App\Services\Transactions\Factories\TransferServiceFactory;
use Tests\TestCase;

class TransferServiceFactoryTest extends TestCase
{
    public function testFactory()
    {
        $transferService = (new TransferServiceFactory())();
        $this->assertInstanceOf(TransferServiceInterface::class, $transferService);
    }

}
