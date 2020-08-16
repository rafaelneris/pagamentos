<?php

namespace App\Application\Providers\Users;

use App\Application\Providers\DefaultServiceProvider;
use App\Domain\Users\Contracts\Mappers\BalanceMapperInterface;
use App\Domain\Users\Mappers\Factories\BalanceMapperFactory;
use App\Interfaces\Http\Controllers\Contracts\Users\BalanceControllerInterface;
use App\Interfaces\Http\Controllers\Factories\Users\BalanceControllerFactory;
use App\Domain\Users\Contracts\Repositories\BalanceRepositoryInterface;
use App\Domain\Users\Repositories\Factories\BalanceRepositoryFactory;
use App\Domain\Users\Contracts\Services\BalanceServiceInterface;
use App\Domain\Users\Services\Factories\BalanceServiceFactory;

/**
 * Class UserBalanceServiceProvider
 *
 * @package App\Application\Providers
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
