<?php

namespace App\Services\Transactions\Factories;

use App\Contracts\Http\Services\ClientServiceInterface;
use App\Services\Transactions\AuthorizerService;

/**
 * Class AuthorizerServiceFactory
 * @package App\Services\Transactions\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class AuthorizerServiceFactory
{
    /**
     * @return \App\Services\Transactions\AuthorizerService
     */
    public function __invoke()
    {
        $clientService = app(ClientServiceInterface::class);
        $externalAuthorizerUri = env('EXTERNAL_AUTHORIZER');
        return new AuthorizerService($clientService, $externalAuthorizerUri);
    }
}
