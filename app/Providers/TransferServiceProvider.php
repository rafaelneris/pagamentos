<?php

namespace App\Providers;

use App\Services\Contracts\Transactions\TransferServiceInterface;
use App\Services\Factories\Transactions\TransferServiceFactory;

/**
 * Class TransferServiceProvider
 * @package App\Providers
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransferServiceProvider extends DefaultServiceProvider
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
        $this->app->bind(
            TransferServiceInterface::class,
            function () {
                return (new TransferServiceFactory())();
            }
        );
    }
}
