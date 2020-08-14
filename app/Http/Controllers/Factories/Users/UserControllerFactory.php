<?php

namespace App\Http\Controllers\Users;

use App\Services\Contracts\Users\UserServiceInterface;

/**
 * Class UsuarioController
 * @package App\Http\Controllers\Usuarios
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserControllerFactory
{
    /**
     * @return \App\Http\Controllers\Users\UserController
     */
    public function __invoke()
    {
        /** @var UserServiceInterface $usuarioService */
        $usuarioService = app(UserServiceInterface::class);

        return new UserController($usuarioService);
    }
}
