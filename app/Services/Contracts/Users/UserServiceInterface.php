<?php

namespace App\Services\Contracts\Users;

/**
 * Interface UsuarioServiceInterface
 *
 * @package App\Services\Usuarios
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface UserServiceInterface
{
    /**
     * @param  array $usuarioDados
     * @return array
     */
    public function register(array $usuarioDados);

    /**
     * Obter usuário por Id
     * @param integer $userId
     * @return array|null
     */
    public function findById(int $userId): ?array;
}
