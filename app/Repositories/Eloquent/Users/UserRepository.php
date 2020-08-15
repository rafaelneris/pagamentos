<?php

namespace App\Repositories\Eloquent;

use App\Model\User;
use App\Repositories\Contracts\Users\UserRepositoryInterface;
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

    /**
     * UsuarioRepository constructor.
     *
     * @param \App\Model\User $usuarioModel
     */
    public function __construct(User $usuarioModel)
    {
        $this->usuarioModel = $usuarioModel;
        $this->queryBuilder = $this->usuarioModel->newQuery();
    }

    /**
     * @inheritDoc
     */
    public function register(array $dados): int
    {
        return $this->queryBuilder->insertGetId($dados);
    }

    /**
     * @inheritDoc
     */
    public function findById(int $userId): ?array
    {
        $userModel = $this->queryBuilder->find($userId);

        return $userModel ? $userModel->toArray() : null;
    }
}
