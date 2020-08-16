<?php

namespace App\Application\Providers;

use App\Domain\Transactions\Contracts\Mappers\TransactionMapperInterface;
use App\Domain\Transactions\Contracts\Services\ValidatorServiceInterface;
use App\Domain\Transactions\Mappers\Factories\TransactionMapperFactory;
use App\Domain\Transactions\Services\Factories\ValidatorServiceFactoryMethod;
use App\Interfaces\Http\Controllers\Contracts\Transactions\TransactionControllerInterface;
use App\Interfaces\Http\Controllers\Factories\Transactions\TransactionControllerFactory;
use App\Domain\Transactions\Contracts\Repositories\TransactionRepositoryInterface;
use App\Domain\Transactions\Repositories\Factories\TransactionRepositoryFactory;
use App\Domain\Transactions\Contracts\Services\NotifierServiceInterface;
use App\Domain\Transactions\Contracts\Services\AuthorizerServiceInterface;
use App\Domain\Transactions\Contracts\Services\TransactionServiceInterface;
use App\Domain\Transactions\Services\Factories\AuthorizerServiceFactory;
use App\Domain\Transactions\Services\Factories\NotifierServiceFactory;
use App\Domain\Transactions\Services\Factories\TransactionServiceFactory;

/**
 * Class TransactionServiceProvider
 * @package App\Application\Providers
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

        $this->bindAuthorizer();
        $this->bindNotifier();
        $this->bindMappers();
        $this->bindValidator();
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

    /**
     * @return void
     */
    private function bindValidator()
    {
        $this->app->bind(
            ValidatorServiceInterface::class,
            function () {
                return (new ValidatorServiceFactoryMethod())();
            }
        );
    }
}
