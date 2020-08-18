<?php

namespace App\Contracts\Users\Repositories;

use App\Entities\Users\BalanceEntity;

/**
 * Interface BalanceRepositoryInterface
 * @package App\Contracts\Users\Repositories
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface BalanceRepositoryInterface
{
    /**
     * Atualizar valores
     * @param \App\Entities\Users\BalanceEntity $balanceEntity
     * @return BalanceEntity
     */
    public function updateValue(BalanceEntity $balanceEntity): BalanceEntity;

    /**
     * Obter saldo por Id de usuário
     * @param string $userId
     * @return \App\Entities\Users\BalanceEntity
     */
    public function getByUserId(string $userId): ?BalanceEntity;
}
