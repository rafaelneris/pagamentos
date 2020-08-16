<?php

namespace App\Infrastructure\Http\Factories;

use App\Infrastructure\Http\ClientService;
use GuzzleHttp\Client;

/**
 * Class ClientServiceFactory
 * @package App\Infrastructure\Http\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class ClientServiceFactory
{
    public function __invoke()
    {
        $guzzleClient = app(Client::class);
        return new ClientService($guzzleClient);
    }
}
