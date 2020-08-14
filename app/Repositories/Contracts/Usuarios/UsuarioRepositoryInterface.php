<?php

namespace App\Repositories\Contracts\Usuarios;

/**
 * Interface UsuarioRepositoryInterface
 *
 * @package App\Repositories\Contracts\Usuarios
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface UsuarioRepositoryInterface
{
    /**
     * @param  array $dados
     * @return int
     */
    public function cadastrar(array $dados): int;
}
