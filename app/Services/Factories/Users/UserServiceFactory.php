<?php

namespace App\Services\Factories\Users;

use App\Repositories\Contracts\Users\UserRepositoryInterface;
use App\Services\Users\UserService;

/**
 * Class UsuarioServiceFactory
 * @package App\Services\Usuarios
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserServiceFactory
{
    /**
     * @return \App\Services\Users\UserService
     */
    public function __invoke(): UserService
    {
        /** @var UserRepositoryInterface $usuarioRepository */
        $usuarioRepository = app(UserRepositoryInterface::class);

        return new UserService($usuarioRepository);
    }
}
