<?php

namespace App\Domain\Transactions\Entities;

use App\Domain\Shared\Contracts\Entities\DefaultEntityInterface;

/**
 * Class TransactionEntity
 * @package App\Domain\Transactions\Entities
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionEntity implements DefaultEntityInterface
{
    /** @var string|null  */
    private ?string $id = null;

    /** @var string|null */
    private ?string $payer = null;

    /** @var string|null */
    private ?string $payee = null;

    /** @var float|null */
    private ?float $value = null;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     * @return TransactionEntity
     */
    public function setId(?string $id): TransactionEntity
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPayer(): ?string
    {
        return $this->payer;
    }

    /**
     * @param string|null $payer
     * @return TransactionEntity
     */
    public function setPayer(?string $payer): TransactionEntity
    {
        $this->payer = $payer;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPayee(): ?string
    {
        return $this->payee;
    }

    /**
     * @param string|null $payee
     * @return TransactionEntity
     */
    public function setPayee(?string $payee): TransactionEntity
    {
        $this->payee = $payee;
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
     * @return TransactionEntity
     */
    public function setValue(?float $value): TransactionEntity
    {
        $this->value = $value;
        return $this;
    }
}
