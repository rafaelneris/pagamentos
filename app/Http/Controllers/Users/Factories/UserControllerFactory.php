<?php

namespace App\Http\Controllers\Users;

use App\Contracts\Users\Mappers\UserMapperInterface;
use App\Contracts\Users\Services\UserServiceInterface;

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
        $usuarioMapper = app(UserMapperInterface::class);

        return new UserController($usuarioService, $usuarioMapper);
    }
}
