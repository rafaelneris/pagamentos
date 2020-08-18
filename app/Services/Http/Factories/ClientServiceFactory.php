<?php

namespace App\Services\Http\Factories;

use App\Services\Http\ClientService;
use GuzzleHttp\Client;

/**
 * Class ClientServiceFactory
 * @package App\Services\Http\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class ClientServiceFactory
{
    /**
     * @return \App\Services\Http\ClientService
     */
    public function __invoke(): ClientService
    {
        $guzzleClient = app(Client::class);
        return new ClientService($guzzleClient);
    }
}
