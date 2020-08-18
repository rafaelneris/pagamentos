<?php

namespace App\Entities\Users;

use App\Entities\DefaultEntityInterface;

/**
 * Class DepositEntity
 * @package App\Entities\Users
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class DepositEntity implements DefaultEntityInterface
{
    /** @var string|null */
    private ?string $userId = null;

    /** @var float|null */
    private ?float $value = null;

    /**
     * @return string|null
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }

    /**
     * @param string|null $userId
     * @return DepositEntity
     */
    public function setUserId(?string $userId): DepositEntity
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getValue(): ?float
    {
        return $this->value;
    }

    /**
     * @param float|null $value
     * @return DepositEntity
     */
    public function setValue(?float $value): DepositEntity
    {
        $this->value = $value;
        return $this;
    }
}
