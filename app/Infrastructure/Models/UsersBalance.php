<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersBalance
 * @package App\Infrastructure\Models
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UsersBalance extends Model
{
    use UuidTrait;

    /** @var bool */
    public $timestamps = false;

    /** @var string */
    protected $table = 'users_balance';

    /** @var string */
    protected $primaryKey = 'userId';

    /**
     * @var array
     */
    protected $casts = [
        'userId' => 'string'
    ];

    /** @var array */
    protected $fillable = [
        'userId',
        'balance'
    ];
}
