<?php

namespace App\Contracts\Users\Services;

use App\Entities\Users\BalanceEntity;
use App\Entities\Users\DepositEntity;

/**
 * Interface BalanceServiceInterface
 * @package App\Contracts\Users\Services
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface BalanceServiceInterface
{

    /**
     * Método para depositar
     * @param DepositEntity $depositEntity
     * @return array
     * @throws \App\Exceptions\UserNotFoundException
     */
    public function deposit(DepositEntity $depositEntity): array;

    /**
     * Método para saldo atual
     * @param string $userId
     * @return float
     */
    public function getBalanceValue(string $userId): float;

    /**
     * Método para verificar saldo para transferência
     * @param string $userId
     * @param float $transferValue
     * @return bool
     */
    public function allowsTransfer(string $userId, float $transferValue): bool;

    /**
     * @param string   $userId
     * @param float $value
     * @return BalanceEntity
     */
    public function withDraw(string $userId, float $value): BalanceEntity;
}
