<?php

namespace App\Application\Providers;

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
