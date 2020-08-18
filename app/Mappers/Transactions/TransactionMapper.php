<?php

namespace App\Mappers\Transactions;

use App\Entities\DefaultEntityInterface;
use App\Mappers\DefaultMapper;
use App\Contracts\Transactions\Mappers\TransactionMapperInterface;

/**
 * Class TransactionMapper
 * @package App\Mappers\Transactions
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionMapper extends DefaultMapper implements TransactionMapperInterface
{
    /** @var \App\Entities\Transactions\TransactionEntity */
    protected $entity;

    /**
     * @param array $dados
     * @return \App\Entities\Transactions\TransactionEntity
     */
    public function map(array $dados): DefaultEntityInterface
    {
        $transactionEntity = clone $this->entity;
        isset($dados['id']) ? $transactionEntity->setId($dados['id']) : $transactionEntity->setId(null);
        $transactionEntity
            ->setPayer($dados['payer'])
            ->setPayee($dados['payee'])
            ->setValue($dados['value']);

        return $transactionEntity;
    }

    /**
     * @param \App\Entities\Transactions\TransactionEntity $entity
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
