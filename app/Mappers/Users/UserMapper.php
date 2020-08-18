<?php

namespace App\Mappers\Users;

use App\Entities\DefaultEntityInterface;
use App\Contracts\Users\Mappers\UserMapperInterface;
use App\Entities\Users\UserEntity;

/**
 * Class UserMapper
 * @package App\Mappers\Users
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserMapper implements UserMapperInterface
{
    /** @var \App\Entities\Users\UserEntity */
    private $userEntity;

    /**
     * UserMapper constructor.
     * @param \App\Entities\Users\UserEntity $userEntity
     */
    public function __construct(UserEntity $userEntity)
    {
        $this->userEntity = $userEntity;
    }

    /**
     * @param array $dados
     * @return \App\Entities\DefaultEntityInterface
     * @throws \App\Exceptions\InvalidDocumentException
     * @throws \App\Exceptions\InvalidEmailException
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
     * @param \App\Entities\Users\UserEntity $userEntity
     * @return array
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
