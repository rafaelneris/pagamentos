<?php

namespace App\Repositories\Eloquent;

use App\Model\Usuario;
use App\Repositories\Contracts\Usuarios\UsuarioRepositoryInterface;

/**
 * Class UsuarioRepository
 *
 * @package App\Repositories\Eloquent
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UsuarioRepository implements UsuarioRepositoryInterface
{
    /** @var \App\Model\Usuario $usuarioModel */
    private Usuario $usuarioModel;

    /**
     * UsuarioRepository constructor.
     *
     * @param \App\Model\Usuario $usuarioModel
     */
    public function __construct(Usuario $usuarioModel)
    {
        $this->usuarioModel = $usuarioModel;
    }

    /**
     * @inheritDoc
     */
    public function cadastrar(array $dados): int
    {
        $queryBuilder = $this->usuarioModel->newQuery();
        return $queryBuilder->insertGetId($dados);
    }
}
