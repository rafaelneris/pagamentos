<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 *
 * @package App
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class Usuario extends Model
{
    /** @var string */
    protected $table = 'usuarios';

    public static $snakeAttributes = false;

    /** @var array */
    protected $fillable = [
        'nome',
        'cpf_cnpj',
        'email',
        'senha',
        'tipo'
    ];
}
