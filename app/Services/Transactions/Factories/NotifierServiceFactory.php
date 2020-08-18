<?php

namespace App\Services\Transactions\Factories;

use App\Contracts\Http\Services\ClientServiceInterface;
use App\Services\Transactions\NotifierService;

/**
 * Class NotifierServiceFactory
 * @package App\Services\Transactions\Factories
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class NotifierServiceFactory
{
    /**
     * @return \App\Services\Transactions\NotifierService
     */
    public function __invoke()
    {
        $clientService = app(ClientServiceInterface::class);
        $externalNotifierUri = env('EXTERNAL_NOTIFIER');
        return new NotifierService($clientService, $externalNotifierUri);
    }
}
