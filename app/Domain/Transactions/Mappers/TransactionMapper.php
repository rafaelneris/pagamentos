<?php

namespace App\Domain\Transactions\Mappers;

use App\Domain\Shared\Contracts\Entities\DefaultEntityInterface;
use App\Domain\Shared\Mapper\DefaultMapper;
use App\Domain\Transactions\Contracts\Mappers\TransactionMapperInterface;

/**
 * Class TransactionMapper
 * @package App\Domain\Transactions\Mappers
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionMapper extends DefaultMapper implements TransactionMapperInterface
{
    /** @var \App\Domain\Transactions\Entities\TransactionEntity */
    protected $entity;

    /**
     * @param array $dados
     * @return mixed
     */
    public function map(array $dados): DefaultEntityInterface
    {
        /** @var \App\Domain\Transactions\Entities\TransactionEntity $entity */
        $transactionEntity = clone $this->entity;
        isset($dados['id']) ? $transactionEntity->setId($dados['id']) : $transactionEntity->setId(null);
        $transactionEntity
            ->setPayer($dados['payer'])
            ->setPayee($dados['payee'])
            ->setValue($dados['value']);

        return $transactionEntity;
    }

    /**
     * @param $entity
     * @return array
     */
    public function revert(DefaultEntityInterface $entity): array
    {
        return [
            'id' => $entity->getId(),
            'payee' => $entity->getPayee(),
            'payer' => $entity->getPayer(),
            'value' => $entity->getValue()
        ];
    }
}
