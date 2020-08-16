<?php

namespace App\Application\Providers\Users;

use App\Application\Providers\DefaultServiceProvider;
use App\Domain\Users\Contracts\Mappers\DepositMapperInterface;
use App\Domain\Users\Mappers\Factories\DepositMapperFactory;

/**
 * Class UserBalanceDepositServiceProvider
 * @package App\Application\Providers
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
