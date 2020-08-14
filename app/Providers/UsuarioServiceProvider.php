<?php

namespace App\Providers;

use App\Http\Controllers\Contracts\Usuarios\UsuarioControllerInterface;
use App\Http\Controllers\Usuarios\UsuarioControllerFactory;
use App\Repositories\Contracts\Usuarios\UsuarioRepositoryInterface;
use App\Repositories\Factories\Usuarios\UsuarioRepositoryFactory;
use App\Services\Contracts\Usuarios\UsuarioServiceInterface;
use App\Services\Factories\Usuarios\UsuarioServiceFactory;
use Illuminate\Support\ServiceProvider;

/**
 * Class UsuarioServiceProvider
 *
 * @package App\Providers
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UsuarioServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->bindControllers();
        $this->bindRepositories();
        $this->bindServices();
    }

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
    private function bindServices()
    {
        $this->app->bind(
            UsuarioServiceInterface::class,
            function () {
                return (new UsuarioServiceFactory())();
            }
        );
    }

    /**
     * @return void
     */
    private function bindRepositories()
    {
        $this->app->bind(
            UsuarioRepositoryInterface::class,
            function () {
                return (new UsuarioRepositoryFactory())();
            }
        );
    }

    /**
     * @return void
     */
    private function bindControllers(): void
    {
        $this->app->bind(
            UsuarioControllerInterface::class,
            function () {
                return (new UsuarioControllerFactory())();
            }
        );
    }
}
