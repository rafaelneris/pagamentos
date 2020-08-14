<?php

namespace App\Repositories\Contracts\Users;

/**
 * Interface BalanceRepositoryInterface
 * @package App\Repositories\Contracts\Users
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface BalanceRepositoryInterface
{
    /**
     * Atualizar valores
     * @param int   $userId
     * @param float $value
     * @return bool
     */
    public function updateValue(int $userId, float $value);

    /**
     * Obter saldo por Id de usuário
     * @param int $userId
     * @return array|null
     */
    public function getByUserId(int $userId);
}
