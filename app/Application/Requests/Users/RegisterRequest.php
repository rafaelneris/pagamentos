<?php

namespace App\Application\Requests\Users;

use App\Application\Requests\DefaultRequest;

/**
 * Class CadastroUsuarioRequest
 *
 * @package App\Application\Requests
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class RegisterRequest extends DefaultRequest
{
    /** @var array */
    protected array $rules = [
        'name' => 'required|string|max:150',
        'document' => 'required|string|unique:users,document|max:14',
        'email' => 'required|string|unique:users,email|max:100',
        'type' => 'required|in:user,store'
    ];
}
