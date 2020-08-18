<?php

namespace App\Repositories\Users;

use App\Contracts\Users\Mappers\UserMapperInterface;
use App\Entities\Users\UserEntity;
use App\Exceptions\RegisterException;
use App\Model\User;
use App\Contracts\Users\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class UsuarioRepository
 *
 * @package App\Repositories\Eloquent
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserRepository implements UserRepositoryInterface
{
    /** @var \App\Model\User $usuarioModel */
    private User $usuarioModel;

    /** @var \Illuminate\Database\Eloquent\Builder */
    private $queryBuilder;

    /** @var \App\Contracts\Users\Mappers\UserMapperInterface */
    private $userMapper;

    /**
     * UserRepository constructor.
     * @param \App\Model\User                                         $usuarioModel
     * @param \App\Contracts\Users\Mappers\UserMapperInterface $userMapper
     */
    public function __construct(User $usuarioModel, UserMapperInterface $userMapper)
    {
        $this->usuarioModel = $usuarioModel;
        $this->queryBuilder = $this->usuarioModel->newQuery();
        $this->userMapper = $userMapper;
    }

    /**
     * @inheritDoc
     * @throws \App\Exceptions\RegisterException
     */
    public function register(UserEntity $userEntity): array
    {
        $queryBuilder = clone $this->queryBuilder;
        $dados = $this->userMapper->revert($userEntity);
        if (!$queryBuilder->insert($dados)) {
            throw new RegisterException();
        }
        return $dados;
    }

    /**
     * @inheritDoc
     */
    public function findById(string $userId): ?array
    {
        $queryBuilder = clone $this->queryBuilder;

        $userModel = $queryBuilder->find($userId);

        return $userModel ? $userModel->toArray() : null;
    }
}
