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

    /**
     * Método para verificar saldo para transferência
     * @param int $userId
     * @param int $transferValue
     * @return bool
     */
    public function allowsTransfer(int $userId, int $transferValue): bool;

    /**
     * @param int   $userId
     * @param float $value
     * @return bool
     */
    public function withDraw(int $userId, float $value): bool;
}
