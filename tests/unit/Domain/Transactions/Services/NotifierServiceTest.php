<?php

namespace Tests\Domain\Transactions\Services;

use App\Exceptions\TransactionsEmailNotSendedException;
use App\Entities\Transactions\TransactionEntity;
use App\Services\Transactions\NotifierService;
use App\Contracts\Http\Services\ClientServiceInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Tests\TestCase;

class NotifierServiceTest extends TestCase
{
    private $client;

    private $responseInterface;

    public function setUp(): void
    {
        parent::setUp();
        $this->configureDependencies();
    }

    public function testNotify()
    {
        $streamInterface = $this->prophesize(StreamInterface::class);
        $streamInterface->getContents()->willReturn('{"message" : "Enviado"}');
        $this->responseInterface->method('getBody')->willReturn($streamInterface->reveal());

        $this->client->method('request')->willReturn($this->responseInterface);

        $concreteClass = new NotifierService($this->client, 'http://mock.com/38883-fgbc-28392-ji903');
        $entity = $this->makeEntity();
        $retorno = $concreteClass->notify($entity);
        $this->assertTrue($retorno);
    }

    public function testErrorNotify()
    {
        $this->expectException(TransactionsEmailNotSendedException::class);
        $streamInterface = $this->prophesize(StreamInterface::class);
        $streamInterface->getContents()->willReturn('{"message" : "Não Enviado"}');
        $this->responseInterface->method('getBody')->willReturn($streamInterface->reveal());

        $this->client->method('request')->willReturn($this->responseInterface);

        $concreteClass = new NotifierService($this->client, 'http://mock.com/38883-fgbc-28392-ji903');
        $entity = $this->makeEntity();
        $concreteClass->notify($entity);
    }

    private function configureDependencies()
    {
        $this->client = $this->createMock(ClientServiceInterface::class);
        $this->responseInterface = $this->createMock(ResponseInterface::class);
    }

    private function makeEntity()
    {
        $transactionEntity = new TransactionEntity();
        $transactionEntity
            ->setId('2f5f8fa1-f14f-4997-aa5c-8ddf6e5c9908')
            ->setPayer('6b1faf2e-fbb1-4af1-ab70-9471c2a0f046')
            ->setPayee('04efa1b0-c76d-436d-a459-363af805bb49')
            ->setValue(200.98);
        return $transactionEntity;
    }
}
