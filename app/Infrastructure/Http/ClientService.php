<?php

namespace App\Infrastructure\Http;

use App\Infrastructure\Contracts\Http\ClientServiceInterface;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ClientService
 * @package App\Infrastructure\Http
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class ClientService implements ClientServiceInterface
{
    /** @var \GuzzleHttp\ClientInterface */
    private $client;

    /**
     * ClientService constructor.
     * @param \GuzzleHttp\ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $method
     * @param string $resource
     * @param array  $configs
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request(string $method, string $resource, array $configs = []): ResponseInterface
    {
        return $this->client->request($method, $resource, $configs);
    }
}
