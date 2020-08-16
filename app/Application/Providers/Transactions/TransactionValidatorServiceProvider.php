<?php

namespace App\Application\Providers\Transactions;

use App\Application\Providers\DefaultServiceProvider;
use App\Domain\Transactions\Contracts\Services\ValidatorServiceInterface;
use App\Domain\Transactions\Services\Factories\ValidatorServiceFactoryMethod;

/**
 * Class TransactionValidatorServiceProvider
 * @package App\Application\Providers
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
