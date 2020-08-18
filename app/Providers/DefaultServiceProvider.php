<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class DefaultServiceProvider
 * @package App\Providers
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
abstract class DefaultServiceProvider extends ServiceProvider
{
    /**
     * Registrar Serviços
     * @return void
     */
    public function register()
    {
        $this->bindControllers();
        $this->bindRepositories();
        $this->bindServices();
    }

    /**
     * Método para bindar controllers
     * @return void
     */
    abstract public function bindControllers(): void;

    /**
     * Método para bindar Repositórios
     * @return void
     */
    abstract public function bindRepositories(): void;

    /**
     * Método para bindar Services
     * @return void
     */
    abstract public function bindServices(): void;
}
