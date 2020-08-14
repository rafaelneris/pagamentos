<?php

namespace App\Services\Factories\Usuarios;

use App\Repositories\Contracts\Usuarios\UsuarioRepositoryInterface;
use App\Services\Usuarios\UsuarioService;

/**
 * Class UsuarioServiceFactory
 * @package App\Services\Usuarios
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UsuarioServiceFactory
{
    /**
     * @return \App\Services\Usuarios\UsuarioService
     */
    public function __invoke(): UsuarioService
    {
        /** @var UsuarioRepositoryInterface $usuarioRepository */
        $usuarioRepository = app(UsuarioRepositoryInterface::class);

        return new UsuarioService($usuarioRepository);
    }
}
