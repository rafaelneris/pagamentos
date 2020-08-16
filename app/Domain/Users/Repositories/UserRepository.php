<?php

namespace App\Domain\Users\Repositories;

use App\Domain\Users\Contracts\Mappers\UserMapperInterface;
use App\Domain\Users\Entities\UserEntity;
use App\Application\Exceptions\RegisterException;
use App\Model\User;
use App\Domain\Users\Contracts\Repositories\UserRepositoryInterface;
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
    private Builder $queryBuilder;

    /** @var \App\Domain\Users\Contracts\Mappers\UserMapperInterface */
    private $userMapper;

    /**
     * UserRepository constructor.
     * @param \App\Model\User                                         $usuarioModel
     * @param \App\Domain\Users\Contracts\Mappers\UserMapperInterface $userMapper
     */
    public function __construct(User $usuarioModel, UserMapperInterface $userMapper)
    {
        $this->usuarioModel = $usuarioModel;
        $this->queryBuilder = $this->usuarioModel->newQuery();
        $this->userMapper = $userMapper;
    }

    /**
     * @inheritDoc
     * @throws \App\Application\Exceptions\RegisterException
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
