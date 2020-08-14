<?php

namespace App\Http\Controllers\Contracts\Usuarios;

use App\Http\Requests\Usuarios\CadastroRequest;
use Illuminate\Http\JsonResponse;

/**
 * Class UserControllerInterface
 *
 * @package App\Http\Controllers\Contracts
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface UsuarioControllerInterface
{
    /**
     * @param  \App\Http\Requests\Usuarios\CadastroRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function cadastrar(CadastroRequest $request): JsonResponse;
}
