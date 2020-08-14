<?php

namespace App\Repositories\Factories\Users;

use App\Model\User;
use App\Repositories\Eloquent\UserRepository;

/**
 * Class UsuarioRepositoryFactory
 * @package App\Repositories\Factories\Usuarios
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserRepositoryFactory
{
    /**
     * @return \App\Repositories\Eloquent\UserRepository
     */
    public function __invoke()
    {
        /** @var User $usuarioModel */
        $usuarioModel = app(User::class);
        return new UserRepository($usuarioModel);
    }
}
