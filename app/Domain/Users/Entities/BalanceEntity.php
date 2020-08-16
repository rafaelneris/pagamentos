<?php

namespace App\Domain\Users\Entities;

use App\Domain\Shared\Contracts\Entities\DefaultEntityInterface;

/**
 * Class BalanceEntity
 * @package App\Domain\Users\Entities
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class BalanceEntity implements DefaultEntityInterface
{
    /** @var string|null */
    private ?string $userId = null;

    /** @var float|null */
    private ?float $balance = null;

    /**
     * @return string|null
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }

    /**
     * @param string|null $userId
     * @return BalanceEntity
     */
    public function setUserId(?string $userId): BalanceEntity
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getBalance(): ?float
    {
        return $this->balance;
    }

    /**
     * @param float|null $balance
     * @return BalanceEntity
     */
    public function setBalance(?float $balance): BalanceEntity
    {
        $this->balance = $balance;
        return $this;
    }
}
