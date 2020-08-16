<?php

namespace App\Application\Providers\Transactions;

use App\Application\Providers\DefaultServiceProvider;
use App\Domain\Transactions\Contracts\Services\AuthorizerServiceInterface;
use App\Domain\Transactions\Services\Factories\AuthorizerServiceFactory;

/**
 * Class ExternalAuthorizerServiceProvider
 * @package App\Application\Providers
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
