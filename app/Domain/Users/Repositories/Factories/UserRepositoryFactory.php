<?php

namespace App\Domain\Users\Repositories\Factories;

use App\Domain\Users\Contracts\Mappers\UserMapperInterface;
use App\Model\User;
use App\Domain\Users\Repositories\UserRepository;

/**
 * Class UsuarioRepositoryFactory
 * @package App\Repositories\Factories\Usuarios
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserRepositoryFactory
{
    /**
     * @return \App\Domain\Users\Repositories\UserRepository
     */
    public function __invoke(): UserRepository
    {
        /** @var User $usuarioModel */
        $usuarioModel = app(User::class);
        $userMapper = app(UserMapperInterface::class);

        return new UserRepository($usuarioModel, $userMapper);
    }
}
