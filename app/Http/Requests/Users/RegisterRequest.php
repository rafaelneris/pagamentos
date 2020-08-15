<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\DefaultRequest;

/**
 * Class CadastroUsuarioRequest
 *
 * @package App\Http\Requests
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class RegisterRequest extends DefaultRequest
{
    /** @var array */
    protected array $rules = [
        'name' => 'required|string|max:150',
        'document' => 'required|string|unique:users,document|max:14',
        'email' => 'required|string|unique:users,email|max:100',
        'password' => 'required|string|max:40',
        'type' => 'required|in:user,store'
    ];
}
