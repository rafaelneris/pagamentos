<?php

namespace App\Domain\Users\Services\Factories;

use App\Domain\Users\Contracts\Repositories\UserRepositoryInterface;
use App\Domain\Users\Services\UserService;

/**
 * Class UsuarioServiceFactory
 * @package App\Services\Usuarios
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserServiceFactory
{
    /**
     * @return \App\Domain\Users\Services\UserService
     */
    public function __invoke(): UserService
    {
        /** @var UserRepositoryInterface $usuarioRepository */
        $usuarioRepository = app(UserRepositoryInterface::class);

        return new UserService($usuarioRepository);
    }
}
