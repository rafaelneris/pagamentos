<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersBalance
 * @package App\Models
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UsersBalance extends Model
{
    /** @var string */
    protected $table = 'users_balance';

    /** @var string */
    protected $primaryKey = 'userId';

    /** @var array */
    protected $fillable = [
        'userId',
        'balance'
    ];
}
