<?php

namespace Tests\Domain\Transactions\Services\Factories;

use App\Domain\Transactions\Contracts\Services\NotifierServiceInterface;
use App\Domain\Transactions\Services\Factories\NotifierServiceFactory;
use Tests\TestCase;

class NotifierServiceFactoryTest extends TestCase
{
    public function testFactory()
    {
        $notifierService = (new NotifierServiceFactory())();
        $this->assertInstanceOf(NotifierServiceInterface::class, $notifierService);
    }
}
