<?php

namespace App\Domain\Transactions\Services\Factories;

use App\Infrastructure\Contracts\Http\ClientServiceInterface;
use App\Domain\Transactions\Services\AuthorizerService;

/**
 * Class AuthorizerServiceFactory
 * @package App\Domain\Transactions\Services\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class AuthorizerServiceFactory
{
    /**
     * @return \App\Domain\Transactions\Services\AuthorizerService
     */
    public function __invoke()
    {
        $clientService = app(ClientServiceInterface::class);
        $externalAuthorizerUri = env('EXTERNAL_AUTHORIZER');
        return new AuthorizerService($clientService, $externalAuthorizerUri);
    }
}
