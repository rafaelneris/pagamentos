<?php

namespace App\Providers\Transactions;

use App\Http\Controllers\Contracts\Transactions\TransactionControllerInterface;
use App\Providers\DefaultServiceProvider;
use App\Contracts\Transactions\Mappers\TransactionMapperInterface;
use App\Mappers\Transactions\Factories\TransactionMapperFactory;
use App\Http\Controllers\Factories\Transactions\TransactionControllerFactory;
use App\Contracts\Transactions\Repositories\TransactionRepositoryInterface;
use App\Repositories\Transactions\Factories\TransactionRepositoryFactory;
use App\Contracts\Transactions\Services\TransactionServiceInterface;
use App\Services\Transactions\Factories\TransactionServiceFactory;

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

        $this->bindMappers();
    }


    /**
     * @return void
     */
    private function bindMappers()
    {
        $this->app->bind(
            TransactionMapperInterface::class,
            function () {
                return (new TransactionMapperFactory())();
            }
        );
    }
}
