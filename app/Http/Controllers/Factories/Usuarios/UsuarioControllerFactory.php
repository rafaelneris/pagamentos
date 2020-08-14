<?php

namespace App\Http\Controllers\Usuarios;

use App\Services\Contracts\Usuarios\UsuarioServiceInterface;

/**
 * Class UsuarioController
 * @package App\Http\Controllers\Usuarios
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UsuarioControllerFactory
{
    /**
     * @return \App\Http\Controllers\Usuarios\UsuarioController
     */
    public function __invoke()
    {
        /** @var UsuarioServiceInterface $usuarioService */
        $usuarioService = app(UsuarioServiceInterface::class);

        return new UsuarioController($usuarioService);
    }
}
