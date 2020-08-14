<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Contracts\Usuarios\UsuarioControllerInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Usuarios\CadastroRequest;
use App\Services\Contracts\Usuarios\UsuarioServiceInterface;
use DomainException;
use Fig\Http\Message\StatusCodeInterface;
use Illuminate\Http\JsonResponse;

/**
 * Class UsuarioController
 *
 * @package App\Http\Controllers\Usuarios
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UsuarioController extends Controller implements UsuarioControllerInterface
{

    /** @var \App\Services\Contracts\Usuarios\UsuarioServiceInterface */
    private UsuarioServiceInterface $usuarioService;

    /**
     * UsuarioController constructor.
     *
     * @param \App\Services\Contracts\Usuarios\UsuarioServiceInterface $usuarioService
     */
    public function __construct(UsuarioServiceInterface $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    /**
     * @inheritDoc
     */
    public function cadastrar(CadastroRequest $request): JsonResponse
    {
        try {
            $usuarioDados = $request->all();
            $dadosInseridos = $this->usuarioService->cadastrar($usuarioDados);

            return response()->json($dadosInseridos, StatusCodeInterface::STATUS_CREATED);
        } catch (DomainException $exception) {
            return response()->json(
                ['message' => "Erro ao cadastrar usuário: {$exception->getMessage()}"],
                StatusCodeInterface::STATUS_INTERNAL_SERVER_ERROR
            );
        }
    }
}
