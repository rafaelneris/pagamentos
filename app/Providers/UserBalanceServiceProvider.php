<?php

namespace App\Providers;

use App\Http\Controllers\Contracts\Users\BalanceControllerInterface;
use App\Http\Controllers\Factories\Users\BalanceControllerFactory;
use App\Repositories\Contracts\Users\BalanceRepositoryInterface;
use App\Repositories\Factories\Users\BalanceRepositoryFactory;
use App\Services\Contracts\Users\BalanceServiceInterface;
use App\Services\Factories\Users\BalanceServiceFactory;

/**
 * Class UserBalanceServiceProvider
 *
 * @package App\Providers
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserBalanceServiceProvider extends DefaultServiceProvider
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
            BalanceServiceInterface::class,
            function () {
                return (new BalanceServiceFactory())();
            }
        );
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
}
