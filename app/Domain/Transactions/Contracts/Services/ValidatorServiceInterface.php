<?php

namespace App\Domain\Transactions\Contracts\Services;

/**
 * Class ValidatorServiceInterface
 * @package App\Domain\Transactions\Contracts\Services
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface ValidatorServiceInterface
{
    /**
     * @throws \App\Application\Exceptions\UserNotFoundException
     */
    public function validateActors(): void;

    /**
     * @throws \App\Application\Exceptions\StoreTransferException
     */
    public function validatePayerEqualsPayee(): void;

    /**
     * Método para validar tipo do pagante
     * @throws \App\Application\Exceptions\StoreTransferException
     */
    public function validatePayer(): void;

    /**
     * Método para validação de saldo
     * @throws \App\Application\Exceptions\NoFundsException
     */
    public function validateBalance(): void;
}
