<?php

namespace App\Domain\Users\Contracts\Services;

use App\Domain\Users\Entities\UserEntity;

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
     * @param \App\Domain\Users\Entities\UserEntity $userEntity
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
     * @throws \App\Application\Exceptions\UserNotFoundException
     */
    public function existsUser(string $userId): void;
}
