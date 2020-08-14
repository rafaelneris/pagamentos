<?php

namespace App\Providers;

use App\Http\Controllers\Contracts\Users\UserControllerInterface;
use App\Http\Controllers\Users\UserControllerFactory;
use App\Repositories\Contracts\Users\UserRepositoryInterface;
use App\Repositories\Factories\Users\UserRepositoryFactory;
use App\Services\Contracts\Users\UserServiceInterface;
use App\Services\Factories\Users\UserServiceFactory;

/**
 * Class UsuarioServiceProvider
 *
 * @package App\Providers
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
    public function bindServices():void
    {
        $this->app->bind(
            UserServiceInterface::class,
            function () {
                return (new UserServiceFactory())();
            }
        );
    }

    /**
     * @return void
     */
    public function bindRepositories():void
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
}
