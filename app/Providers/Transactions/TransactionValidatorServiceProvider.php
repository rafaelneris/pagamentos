<?php

namespace App\Providers\Transactions;

use App\Providers\DefaultServiceProvider;
use App\Contracts\Transactions\Services\ValidatorServiceInterface;
use App\Services\Transactions\Factories\ValidatorServiceFactoryMethod;

/**
 * Class TransactionValidatorServiceProvider
 * @package App\Providers
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionValidatorServiceProvider extends DefaultServiceProvider
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
        $this->bindValidator();
    }

    /**
     * @return void
     */
    private function bindValidator()
    {
        $this->app->bind(
            ValidatorServiceInterface::class,
            function () {
                return (new ValidatorServiceFactoryMethod())();
            }
        );
    }
}
