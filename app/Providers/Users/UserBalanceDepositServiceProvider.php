<?php

namespace App\Providers\Users;

use App\Providers\DefaultServiceProvider;
use App\Contracts\Users\Mappers\DepositMapperInterface;
use App\Mappers\Users\Factories\DepositMapperFactory;

/**
 * Class UserBalanceDepositServiceProvider
 * @package App\Providers
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserBalanceDepositServiceProvider extends DefaultServiceProvider
{

    /**
     * Método para bindar controllers
     * @return void
     */
    public function bindControllers(): void
    {
        // TODO: Implement bindControllers() method.
    }

    /**
     * Método para bindar Repositórios
     * @return void
     */
    public function bindRepositories(): void
    {
        // TODO: Implement bindRepositories() method.
    }

    /**
     * Método para bindar Services
     * @return void
     */
    public function bindServices(): void
    {
        $this->bindMappers();
    }

    /**
     * @return void
     */
    public function bindMappers(): void
    {
        $this->app->bind(
            DepositMapperInterface::class,
            function () {
                return (new DepositMapperFactory())();
            }
        );
    }
}
