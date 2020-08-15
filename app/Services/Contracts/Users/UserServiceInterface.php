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
    const TYPE_USER = 'user';

    /**
     * @param  array $usuarioDados
     * @return array
     */
    public function register(array $usuarioDados): array;

    /**
     * Obter usuário por Id
     * @param integer $userId
     * @return array|null
     */
    public function findById(int $userId): ?array;

    /**
     * Valida se o usuário é do tipo 'user'
     * @param int $userId
     * @return bool
     */
    public function isUserType(int $userId): bool;

    /**
     * @param int $userId
     * @throws \App\Exceptions\UserNotFoundException
     */
    public function existsUser(int $userId): void;
}
