<?php

namespace App\Repositories\Factories\Usuarios;

use App\Model\Usuario;
use App\Repositories\Eloquent\UsuarioRepository;

/**
 * Class UsuarioRepositoryFactory
 * @package App\Repositories\Factories\Usuarios
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UsuarioRepositoryFactory
{
    /**
     * @return \App\Repositories\Eloquent\UsuarioRepository
     */
    public function __invoke()
    {
        /** @var Usuario $usuarioModel */
        $usuarioModel = app(Usuario::class);
        return new UsuarioRepository($usuarioModel);
    }
}
