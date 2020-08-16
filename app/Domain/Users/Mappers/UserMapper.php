<?php

namespace App\Domain\Users\Mappers;

use App\Domain\Shared\Contracts\Entities\DefaultEntityInterface;
use App\Domain\Users\Contracts\Mappers\UserMapperInterface;
use App\Entities\UserEntity;

/**
 * Class UserMapper
 * @package App\Domain\Users\Mappers
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserMapper implements UserMapperInterface
{
    /** @var \App\Entities\UserEntity */
    private $userEntity;

    /**
     * UserMapper constructor.
     * @param \App\Entities\UserEntity $userEntity
     */
    public function __construct(UserEntity $userEntity)
    {
        $this->userEntity = $userEntity;
    }

    /**
     * @param array $dados
     * @return \App\Domain\Shared\Contracts\Entities\DefaultEntityInterface
     * @throws \App\Application\Exceptions\InvalidDocumentException
     * @throws \App\Application\Exceptions\InvalidEmailException
     */
    public function map(array $dados): DefaultEntityInterface
    {
        $userEntity = clone $this->userEntity;
        isset($dados['id']) ? $userEntity->setId($dados['id']) : $userEntity->setId(null);
        $userEntity
            ->setDocument($dados['document'])
            ->setName($dados['name'])
            ->setEmail($dados['email'])
            ->setType($dados['type']);
        return $userEntity;
    }

    /**
     * @inheritDoc
     */
    public function revert(DefaultEntityInterface $userEntity): array
    {
        return [
            'id' => $userEntity->getId(),
            'document' => $userEntity->getDocument(),
            'name' => $userEntity->getName(),
            'email' => $userEntity->getEmail(),
            'type' => $userEntity->getType()
        ];
    }
}
