<?php

namespace App\Application\Providers\Transactions;

use App\Application\Providers\DefaultServiceProvider;
use App\Domain\Transactions\Contracts\Services\TransferServiceInterface;
use App\Domain\Transactions\Services\Factories\TransferServiceFactory;

/**
 * Class TransferServiceProvider
 * @package App\Application\Providers
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
