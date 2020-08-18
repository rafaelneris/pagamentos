<?php

namespace App\Providers\Users;

use App\Http\Controllers\Contracts\Users\UserControllerInterface;
use App\Providers\DefaultServiceProvider;
use App\Http\Controllers\Users\UserControllerFactory;
use App\Mappers\Users\Factories\UserMapperFactory;
use App\Contracts\Users\Mappers;
use App\Contracts\Users\Repositories\UserRepositoryInterface;
use App\Repositories\Users\Factories\UserRepositoryFactory;
use App\Contracts\Users\Services\UserServiceInterface;
use App\Services\Users\Factories\UserServiceFactory;

/**
 * Class UsuarioServiceProvider
 *
 * @package App\Providers
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserServiceProvider extends DefaultServiceProvider
{
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
    }
}
