<?php

namespace App\Services\Users;

use App\Exceptions\UserNotFoundException;
use App\Repositories\Contracts\Users\UserRepositoryInterface;
use App\Services\Contracts\Users\UserServiceInterface;

/**
 * Class UsuarioService
 *
 * @package App\Services\Users
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
    public function register(array $dados): array
    {
        $usuarioId =  $this->usuarioRepository->register($dados);
        $dados['id'] = $usuarioId;

        return $dados;
    }

    /**
     * @inheritDoc
     */
    public function findById(int $userId): ?array
    {
        return $this->usuarioRepository->findById($userId);
    }

    /**
     * @inheritDoc
     */
    public function isUserType(int $userId): bool
    {
        $user = $this->findById($userId);
        return $user['type'] == UserServiceInterface::TYPE_USER;
    }

    /**
     * @inheritDoc
     */
    public function existsUser(int $userId): void
    {
        $user = $this->findById($userId);
        if (!isset($user)) {
            throw new UserNotFoundException("Usuário não existe");
        }
    }
}
