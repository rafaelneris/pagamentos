<?php

namespace App\Domain\Users\Services;

use App\Entities\UserEntity;
use App\Application\Exceptions\UserNotFoundException;
use App\Domain\Users\Contracts\Repositories\UserRepositoryInterface;
use App\Domain\Users\Contracts\Services\UserServiceInterface;
use Ramsey\Uuid\Uuid;

/**
 * Class UsuarioService
 *
 * @package App\Domain\Users\Services
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserService implements UserServiceInterface
{

    /** @var \App\Domain\Users\Contracts\Repositories\UserRepositoryInterface */
    private $usuarioRepository;

    /**
     * UsuarioService constructor.
     *
     * @param \App\Domain\Users\Contracts\Repositories\UserRepositoryInterface $usuarioRepository
     */
    public function __construct(UserRepositoryInterface $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    /**
     * @inheritDoc
     */
    public function register(UserEntity $userEntity): array
    {
        $userEntity->setId(Uuid::uuid4());
        $dados = $this->usuarioRepository->register($userEntity);

        return $dados;
    }

    /**
     * @inheritDoc
     */
    public function findById(string $userId): ?array
    {
        return $this->usuarioRepository->findById($userId);
    }

    /**
     * @inheritDoc
     */
    public function isUserType(string $userId): bool
    {
        $user = $this->findById($userId);
        return $user['type'] == UserServiceInterface::TYPE_USER;
    }

    /**
     * @inheritDoc
     */
    public function existsUser(string $userId): void
    {
        $user = $this->findById($userId);
        if (!isset($user)) {
            throw new UserNotFoundException($userId);
        }
    }
}
