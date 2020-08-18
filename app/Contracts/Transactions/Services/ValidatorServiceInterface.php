<?php

namespace App\Contracts\Transactions\Services;

/**
 * Class ValidatorServiceInterface
 * @package App\Contracts\Transactions\Services
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface ValidatorServiceInterface
{
    /**
     * @throws \App\Exceptions\UserNotFoundException
     */
    public function validateActors(): void;

    /**
     * @throws \App\Exceptions\StoreTransferException
     */
    public function validatePayerEqualsPayee(): void;

    /**
     * Método para validar tipo do pagante
     * @throws \App\Exceptions\StoreTransferException
     */
    public function validatePayer(): void;

    /**
     * Método para validação de saldo
     * @throws \App\Exceptions\NoFundsException
     */
    public function validateBalance(): void;
}
