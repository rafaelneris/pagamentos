<?php

namespace App\Application\Providers\Transactions;

use App\Application\Providers\DefaultServiceProvider;
use App\Domain\Transactions\Contracts\Services\NotifierServiceInterface;
use App\Domain\Transactions\Services\Factories\NotifierServiceFactory;

/**
 * Class ExternalNotifierServiceProvider
 * @package App\Application\Providers
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class ExternalNotifierServiceProvider extends DefaultServiceProvider
{
    /**
     * Método para bindar controllers
     * @return void
     */
    public function bindControllers(): void
    {
        // TODO: Implement bindControllers() method.
    }

    /**
     * Método para bindar Repositórios
     * @return void
     */
    public function bindRepositories(): void
    {
        // TODO: Implement bindRepositories() method.
    }

    /**
     * Método para bindar Services
     * @return void
     */
    public function bindServices(): void
    {
        $this->bindNotifier();
    }


    /**
     * @return void
     */
    private function bindNotifier()
    {
        $this->app->bind(
            NotifierServiceInterface::class,
            function () {
                return (new NotifierServiceFactory())();
            }
        );
    }
}
