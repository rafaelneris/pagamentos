<?php

namespace App\Domain\Users\Contracts\Repositories;

use App\Entities\UserEntity;

/**
 * Interface UsuarioRepositoryInterface
 *
 * @package App\Repositories\Contracts\Usuarios
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface UserRepositoryInterface
{
    /**
     * @param \App\Entities\UserEntity $userEntity
     * @return int
     */
    public function register(UserEntity $userEntity): array;

    /**
     * @param string $userId
     * @return array|null
     */
    public function findById(string $userId): ?array;
}
