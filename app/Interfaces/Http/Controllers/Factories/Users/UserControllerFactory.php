<?php

namespace App\Interfaces\Http\Controllers\Users;

use App\Domain\Users\Contracts\Mappers\UserMapperInterface;
use App\Domain\Users\Contracts\Services\UserServiceInterface;

/**
 * Class UsuarioController
 * @package App\Interfaces\Http\Controllers\Usuarios
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserControllerFactory
{
    /**
     * @return \App\Interfaces\Http\Controllers\Users\UserController
     */
    public function __invoke()
    {
        /** @var UserServiceInterface $usuarioService */
        $usuarioService = app(UserServiceInterface::class);
        $usuarioMapper = app(UserMapperInterface::class);

        return new UserController($usuarioService, $usuarioMapper);
    }
}
