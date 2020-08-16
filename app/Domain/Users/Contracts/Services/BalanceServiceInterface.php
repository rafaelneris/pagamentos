<?php

namespace App\Domain\Users\Contracts\Services;

use App\Domain\Users\Entities\BalanceEntity;
use App\Domain\Users\Entities\DepositEntity;

/**
 * Interface BalanceServiceInterface
 * @package App\Domain\Users\Contracts\Services
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface BalanceServiceInterface
{

    /**
     * Método para depositar
     * @param DepositEntity $depositEntity
     * @return array
     * @throws \App\Application\Exceptions\UserNotFoundException
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
     * @return bool
     */
    public function withDraw(string $userId, float $value): BalanceEntity;
}
