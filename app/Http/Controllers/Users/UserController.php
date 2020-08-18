<?php

namespace App\Http\Controllers\Users;

use App\Contracts\Users\Mappers\UserMapperInterface;
use App\Http\Controllers\Contracts\Users\UserControllerInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\RegisterRequest;
use App\Contracts\Users\Services\UserServiceInterface;
use Fig\Http\Message\StatusCodeInterface;
use Illuminate\Http\JsonResponse;

/**
 * Class UsuarioController
 *
 * @package App\Http\Controllers\Usuarios
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserController extends Controller implements UserControllerInterface
{
    /** @var \App\Contracts\Users\Services\UserServiceInterface */
    private UserServiceInterface $usuarioService;

    /** @var \App\Contracts\Users\Mappers\UserMapperInterface */
    private $userMapper;

    /**
     * UserController constructor.
     * @param \App\Contracts\Users\Services\UserServiceInterface      $usuarioService
     * @param \App\Contracts\Users\Mappers\UserMapperInterface $userMapper
     */
    public function __construct(UserServiceInterface $usuarioService, UserMapperInterface $userMapper)
    {
        $this->usuarioService = $usuarioService;
        $this->userMapper = $userMapper;
    }

    /**
     * @param \App\Http\Requests\Users\RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $userData = $request->all();
        /** @var \App\Entities\Users\UserEntity $userEntity */
        $userEntity = $this->userMapper->map($userData);
        $dadosInseridos = $this->usuarioService->register($userEntity);

        return response()->json($dadosInseridos, StatusCodeInterface::STATUS_CREATED);
    }
}
