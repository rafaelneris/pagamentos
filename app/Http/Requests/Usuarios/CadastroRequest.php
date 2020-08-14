<?php

namespace App\Http\Requests\Usuarios;

use App\Http\Requests\DefaultRequest;

/**
 * Class CadastroUsuarioRequest
 *
 * @package App\Http\Requests
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class CadastroRequest extends DefaultRequest
{
    /** @var array */
    protected array $regras = [
        'nome' => 'required|string|max:150',
        'cpfCnpj' => 'required|string|unique:usuarios,cpfCnpj|max:14',
        'email' => 'required|string|unique:usuarios|max:100',
        'senha' => 'required|string|max:40',
        'tipo' => 'required|in:usuario,loja'
    ];
}
