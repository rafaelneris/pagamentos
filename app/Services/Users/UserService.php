<?php

namespace App\Services\Users;

use App\Repositories\Contracts\Users\UserRepositoryInterface;
use App\Services\Contracts\Users\UserServiceInterface;

/**
 * Class UsuarioService
 *
 * @package App\Services\Usuarios
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserService implements UserServiceInterface
{

    /** @var \App\Repositories\Contracts\Users\UserRepositoryInterface */
    private $usuarioRepository;

    /**
     * UsuarioService constructor.
     *
     * @param \App\Repositories\Contracts\Users\UserRepositoryInterface $usuarioRepository
     */
    public function __construct(UserRepositoryInterface $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    /**
     * @inheritDoc
     */
    public function register(array $dados)
    {
        $usuarioId =  $this->usuarioRepository->register($dados);
        $dados['id'] = $usuarioId;

        return $dados;
    }

    /**
     * Obter usuário por Id
     * @param integer $userId
     * @return array|null
     */
    public function findById(int $userId): ?array
    {
        return $this->usuarioRepository->findById($userId);
    }
}
