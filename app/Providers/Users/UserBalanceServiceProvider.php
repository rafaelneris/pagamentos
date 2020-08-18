<?php

namespace App\Providers\Users;

use App\Http\Controllers\Contracts\Users\BalanceControllerInterface;
use App\Providers\DefaultServiceProvider;
use App\Contracts\Users\Mappers\BalanceMapperInterface;
use App\Mappers\Users\Factories\BalanceMapperFactory;
use App\Http\Controllers\Factories\Users\BalanceControllerFactory;
use App\Contracts\Users\Repositories\BalanceRepositoryInterface;
use App\Repositories\Users\Factories\BalanceRepositoryFactory;
use App\Contracts\Users\Services\BalanceServiceInterface;
use App\Services\Users\Factories\BalanceServiceFactory;

/**
 * Class UserBalanceServiceProvider
 *
 * @package App\Providers
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserBalanceServiceProvider extends DefaultServiceProvider
{
    /**
     * @return void
     */
    public function bindServices(): void
    {
        $this->app->bind(
            BalanceServiceInterface::class,
            function () {
                return (new BalanceServiceFactory())();
            }
        );
        $this->bindMappers();
    }

    /**
     * @return void
     */
    public function bindRepositories(): void
    {
        $this->app->bind(
            BalanceRepositoryInterface::class,
            function () {
                return (new BalanceRepositoryFactory())();
            }
        );
    }

    /**
     * @return void
     */
    public function bindControllers(): void
    {
        $this->app->bind(
            BalanceControllerInterface::class,
            function () {
                return (new BalanceControllerFactory())();
            }
        );
    }

    /**
     * @return void
     */
    public function bindMappers(): void
    {
        $this->app->bind(
            BalanceMapperInterface::class,
            function () {
                return (new BalanceMapperFactory())();
            }
        );
    }
}
