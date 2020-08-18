<?php

namespace Tests\Services\Http;

use App\Services\Http\ClientService;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Tests\TestCase;

/**
 * Class ClientServiceTest
 * @package Tests\Interfaces
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class ClientServiceTest extends TestCase
{
    private $guzzleClient;

    public function setUp(): void
    {
        parent::setUp();
        $this->configureDependencies();
    }

    public function testRequest()
    {
        $clientService = new ClientService($this->guzzleClient);
        $response = $clientService->request('GET', 'http://mock.com.br/user/29393');
        $this->assertInstanceOf(ResponseInterface::class, $response);
    }

    private function configureDependencies()
    {
        $this->guzzleClient = $this->createMock(Client::class);
        $responseInterface = $this->createMock(ResponseInterface::class);
        $this->guzzleClient->method('request')->willReturn($responseInterface);
    }
}
