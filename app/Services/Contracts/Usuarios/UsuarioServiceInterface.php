<?php

namespace App\Services\Contracts\Usuarios;

/**
 * Interface UsuarioServiceInterface
 *
 * @package App\Services\Usuarios
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface UsuarioServiceInterface
{
    /**
     * @param  array $usuarioDados
     * @return array
     */
    public function cadastrar(array $usuarioDados);
}
