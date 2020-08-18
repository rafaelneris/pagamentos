<?php

namespace Tests\Domain\Transactions\Services\Factories;

use App\Contracts\Transactions\Services\NotifierServiceInterface;
use App\Services\Transactions\Factories\NotifierServiceFactory;
use Tests\TestCase;

class NotifierServiceFactoryTest extends TestCase
{
    public function testFactory()
    {
        $notifierService = (new NotifierServiceFactory())();
        $this->assertInstanceOf(NotifierServiceInterface::class, $notifierService);
    }
}
