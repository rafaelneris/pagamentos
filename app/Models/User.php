<?php

namespace App\Model;

use App\Model\UuidTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 *
 * @package App
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
class User extends Model
{
    use UuidTrait;

    /** @var string */
    protected $table = 'users';

    public static $snakeAttributes = false;

    /** @var array */
    protected $fillable = [
        'name',
        'document',
        'email',
        'type'
    ];
}
