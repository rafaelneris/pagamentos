<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Contracts\Users\UserControllerInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\RegisterRequest;
use App\Services\Contracts\Users\UserServiceInterface;
use DomainException;
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

    /** @var \App\Services\Contracts\Users\UserServiceInterface */
    private UserServiceInterface $usuarioService;

    /**
     * UsuarioController constructor.
     *
     * @param \App\Services\Contracts\Users\UserServiceInterface $usuarioService
     */
    public function __construct(UserServiceInterface $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    /**
     * @inheritDoc
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        try {
            $usuarioDados = $request->all();
            $dadosInseridos = $this->usuarioService->register($usuarioDados);

            return response()->json($dadosInseridos, StatusCodeInterface::STATUS_CREATED);
        } catch (DomainException $exception) {
            return response()->json(
                ['message' => "Erro ao register usuário: {$exception->getMessage()}"],
                StatusCodeInterface::STATUS_INTERNAL_SERVER_ERROR
            );
        }
    }
}
