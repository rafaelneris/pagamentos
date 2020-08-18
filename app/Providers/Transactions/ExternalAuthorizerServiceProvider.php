<?php

namespace App\Providers\Transactions;

use App\Providers\DefaultServiceProvider;
use App\Contracts\Transactions\Services\AuthorizerServiceInterface;
use App\Services\Transactions\Factories\AuthorizerServiceFactory;

/**
 * Class ExternalAuthorizerServiceProvider
 * @package App\Providers
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class ExternalAuthorizerServiceProvider extends DefaultServiceProvider
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
        $this->bindAuthorizer();
    }

    /**
     * @return void
     */
    private function bindAuthorizer()
    {
        $this->app->bind(
            AuthorizerServiceInterface::class,
            function () {
                return (new AuthorizerServiceFactory())();
            }
        );
    }
}
