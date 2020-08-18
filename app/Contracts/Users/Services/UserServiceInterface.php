<?php

namespace App\Contracts\Users\Services;

use App\Entities\Users\UserEntity;

/**
 * Interface UsuarioServiceInterface
 *
 * @package App\Services\Usuarios
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface UserServiceInterface
{
    /** @var string */
    public const TYPE_USER = 'user';

    /**
     * @param \App\Entities\Users\UserEntity $userEntity
     * @return array
     */
    public function register(UserEntity $userEntity): array;

    /**
     * Obter usuário por Id
     * @param string $userId
     * @return array|null
     */
    public function findById(string $userId): ?array;

    /**
     * Valida se o usuário é do tipo 'user'
     * @param string $userId
     * @return bool
     */
    public function isUserType(string $userId): bool;

    /**
     * @param string $userId
     * @throws \App\Exceptions\UserNotFoundException
     */
    public function existsUser(string $userId): void;
}
