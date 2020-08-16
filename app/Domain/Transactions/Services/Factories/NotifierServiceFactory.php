<?php

namespace App\Domain\Transactions\Services\Factories;

use App\Infrastructure\Contracts\Http\ClientServiceInterface;
use App\Domain\Transactions\Services\NotifierService;

/**
 * Class NotifierServiceFactory
 * @package App\Domain\Transactions\Services\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class NotifierServiceFactory
{
    /**
     * @return \App\Domain\Transactions\Services\NotifierService
     */
    public function __invoke()
    {
        $clientService = app(ClientServiceInterface::class);
        $externalNotifierUri = env('EXTERNAL_NOTIFIER');
        return new NotifierService($clientService, $externalNotifierUri);
    }
}
