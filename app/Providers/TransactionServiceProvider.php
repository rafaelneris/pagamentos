<?php

namespace App\Providers;

use App\Http\Controllers\Contracts\Transactions\TransactionControllerInterface;
use App\Http\Controllers\Factories\Transactions\TransactionControllerFactory;
use App\Repositories\Contracts\Transactions\TransactionRepositoryInterface;
use App\Repositories\Factories\Transactions\TransactionRepositoryFactory;
use App\Services\Contracts\Transactions\TransactionServiceInterface;
use App\Services\Factories\Transactions\TransactionServiceFactory;

/**
 * Class TransactionServiceProvider
 * @package App\Providers
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionServiceProvider extends DefaultServiceProvider
{

    /**
     * Método para bindar controllers
     * @return void
     */
    public function bindControllers(): void
    {
        $this->app->bind(
            TransactionControllerInterface::class,
            function () {
                return (new TransactionControllerFactory())();
            }
        );
    }

    /**
     * Método para bindar Repositórios
     * @return void
     */
    public function bindRepositories(): void
    {
        $this->app->bind(
            TransactionRepositoryInterface::class,
            function () {
                return (new TransactionRepositoryFactory())();
            }
        );
    }

    /**
     * Método para bindar Services
     * @return void
     */
    public function bindServices(): void
    {
        $this->app->bind(
            TransactionServiceInterface::class,
            function () {
                return (new TransactionServiceFactory())();
            }
        );
    }
}
