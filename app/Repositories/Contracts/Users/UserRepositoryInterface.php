<?php

namespace App\Repositories\Contracts\Users;

/**
 * Interface UsuarioRepositoryInterface
 *
 * @package App\Repositories\Contracts\Usuarios
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface UserRepositoryInterface
{
    /**
     * @param  array $dados
     * @return int
     */
    public function register(array $dados): int;

    /**
     * @param int $userId
     * @return array|null
     */
    public function findById(int $userId): ?array;
}
