<?php

namespace App\Domain\Users\Contracts\Repositories;

use App\Domain\Users\Entities\BalanceEntity;

/**
 * Interface BalanceRepositoryInterface
 * @package App\Domain\Users\Contracts\Repositories
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface BalanceRepositoryInterface
{
    /**
     * Atualizar valores
     * @param \App\Domain\Users\Entities\BalanceEntity $balanceEntity
     * @return bool
     */
    public function updateValue(BalanceEntity $balanceEntity): BalanceEntity;

    /**
     * Obter saldo por Id de usuário
     * @param string $userId
     * @return \App\Domain\Users\Entities\BalanceEntity
     */
    public function getByUserId(string $userId): ?BalanceEntity;
}
