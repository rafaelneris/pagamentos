<?php

namespace App\Application\Providers;

use App\Domain\Users\Mappers\Factories\BalanceMapperFactory;
use App\Domain\Users\Mappers\Factories\DepositMapperFactory;
use App\Interfaces\Http\Controllers\Contracts\Users\UserControllerInterface;
use App\Interfaces\Http\Controllers\Users\UserControllerFactory;
use App\Domain\Users\Mappers\Factories\UserMapperFactory;
use App\Domain\Users\Contracts\Mappers;
use App\Domain\Users\Contracts\Repositories\UserRepositoryInterface;
use App\Domain\Users\Repositories\Factories\UserRepositoryFactory;
use App\Domain\Users\Contracts\Services\UserServiceInterface;
use App\Domain\Users\Services\Factories\UserServiceFactory;

/**
 * Class UsuarioServiceProvider
 *
 * @package App\Application\Providers
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserServiceProvider extends DefaultServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * @return void
     */
    public function bindServices(): void
    {
        $this->app->bind(
            UserServiceInterface::class,
            function () {
                return (new UserServiceFactory())();
            }
        );
        $this->bindMapper();
    }

    /**
     * @return void
     */
    public function bindRepositories(): void
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            function () {
                return (new UserRepositoryFactory())();
            }
        );
    }

    /**
     * @return void
     */
    public function bindControllers(): void
    {
        $this->app->bind(
            UserControllerInterface::class,
            function () {
                return (new UserControllerFactory())();
            }
        );
    }

    private function bindMapper(): void
    {
        $this->app->bind(
            Mappers\UserMapperInterface::class,
            function () {
                return (new UserMapperFactory())();
            }
        );

        $this->app->bind(
            Mappers\BalanceMapperInterface::class,
            function () {
                return (new BalanceMapperFactory())();
            }
        );

        $this->app->bind(
            Mappers\DepositMapperInterface::class,
            function () {
                return (new DepositMapperFactory())();
            }
        );
    }
}
