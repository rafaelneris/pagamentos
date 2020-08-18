<?php

namespace App\Contracts\Users\Repositories;

use App\Entities\Users\UserEntity;

/**
 * Interface UsuarioRepositoryInterface
 *
 * @package App\Repositories\Contracts\Usuarios
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface UserRepositoryInterface
{
    /**
     * @param \App\Entities\Users\UserEntity $userEntity
     * @return array
     */
    public function register(UserEntity $userEntity): array;

    /**
     * @param string $userId
     * @return array|null
     */
    public function findById(string $userId): ?array;
}
