<?php

namespace App\Repositories\Users\Factories;

use App\Contracts\Users\Mappers\UserMapperInterface;
use App\Model\User;
use App\Repositories\Users\UserRepository;

/**
 * Class UsuarioRepositoryFactory
 * @package App\Repositories\Factories\Usuarios
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserRepositoryFactory
{
    /**
     * @return \App\Repositories\Users\UserRepository
     */
    public function __invoke(): UserRepository
    {
        /** @var User $usuarioModel */
        $usuarioModel = app(User::class);
        $userMapper = app(UserMapperInterface::class);

        return new UserRepository($usuarioModel, $userMapper);
    }
}
