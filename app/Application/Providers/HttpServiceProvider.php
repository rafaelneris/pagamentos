<?php

namespace App\Application\Providers;

use App\Infrastructure\Contracts\Http\ClientServiceInterface;
use App\Infrastructure\Http\Factories\ClientServiceFactory;

/**
 * Class HttpServiceProvider
 * @package App\Application\Providers
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class HttpServiceProvider extends DefaultServiceProvider
{

    /**
     * Método para bindar controllers
     * @return void
     */
    public function bindControllers(): void
    {
    }

    /**
     * Método para bindar Repositórios
     * @return void
     */
    public function bindRepositories(): void
    {
    }

    /**
     * Método para bindar Services
     * @return void
     */
    public function bindServices(): void
    {
        $this->app->bind(
            ClientServiceInterface::class,
            function () {
                return (new ClientServiceFactory())();
            }
        );
    }
}
