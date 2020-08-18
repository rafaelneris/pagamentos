<?php

namespace App\Providers;

use App\Contracts\Http\Services\ClientServiceInterface;
use App\Services\Http\Factories\ClientServiceFactory;

/**
 * Class HttpServiceProvider
 * @package App\Providers
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
