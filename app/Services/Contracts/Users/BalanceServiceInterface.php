<?php

namespace App\Services\Contracts\Users;

/**
 * Interface BalanceServiceInterface
 * @package App\Services\Contracts\Users
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface BalanceServiceInterface
{

    /**
     * Método para depositar
     * @param array $depositData
     * @return bool
     * @throws \App\Exceptions\UserNotFoundException
     */
    public function deposit(array $depositData);

    /**
     * Método para saldo atual
     * @param int $userId
     * @return float
     */
    public function getBalanceValue(int $userId);
}
