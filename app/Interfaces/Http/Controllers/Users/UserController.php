<?php

namespace App\Interfaces\Http\Controllers\Users;

use App\Domain\Users\Contracts\Mappers\UserMapperInterface;
use App\Interfaces\Http\Controllers\Contracts\Users\UserControllerInterface;
use App\Interfaces\Http\Controllers\Controller;
use App\Application\Requests\Users\RegisterRequest;
use App\Domain\Users\Contracts\Services\UserServiceInterface;
use Fig\Http\Message\StatusCodeInterface;
use Illuminate\Http\JsonResponse;

/**
 * Class UsuarioController
 *
 * @package App\Interfaces\Http\Controllers\Usuarios
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserController extends Controller implements UserControllerInterface
{
    /** @var \App\Domain\Users\Contracts\Services\UserServiceInterface */
    private UserServiceInterface $usuarioService;

    /** @var \App\Domain\Users\Contracts\Mappers\UserMapperInterface */
    private $userMapper;

    /**
     * UserController constructor.
     * @param \App\Domain\Users\Contracts\Services\UserServiceInterface      $usuarioService
     * @param \App\Domain\Users\Contracts\Mappers\UserMapperInterface $userMapper
     */
    public function __construct(UserServiceInterface $usuarioService, UserMapperInterface $userMapper)
    {
        $this->usuarioService = $usuarioService;
        $this->userMapper = $userMapper;
    }

    /**
     * @param \App\Application\Requests\Users\RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $userData = $request->all();
        $userEntity = $this->userMapper->map($userData);
        $dadosInseridos = $this->usuarioService->register($userEntity);

        return response()->json($dadosInseridos, StatusCodeInterface::STATUS_CREATED);
    }


}
