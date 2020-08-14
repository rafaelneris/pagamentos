<?php

namespace App\Services\Usuarios;

use App\Repositories\Contracts\Usuarios\UsuarioRepositoryInterface;
use App\Services\Contracts\Usuarios\UsuarioServiceInterface;

/**
 * Class UsuarioService
 *
 * @package App\Services\Usuarios
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UsuarioService implements UsuarioServiceInterface
{

    /** @var \App\Repositories\Contracts\Usuarios\UsuarioRepositoryInterface */
    private $usuarioRepository;

    /**
     * UsuarioService constructor.
     *
     * @param \App\Repositories\Contracts\Usuarios\UsuarioRepositoryInterface $usuarioRepository
     */
    public function __construct(UsuarioRepositoryInterface $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    /**
     * @inheritDoc
     */
    public function cadastrar(array $dados)
    {
        $usuarioId =  $this->usuarioRepository->cadastrar($dados);
        $dados['id'] = $usuarioId;

        return $dados;
    }
}
