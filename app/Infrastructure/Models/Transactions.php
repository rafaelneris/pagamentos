<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Transactions
 * @package App\Infrastructure\Models
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class Transactions extends Model
{
    use UuidTrait;

    /** @var string */
    protected $table = 'transactions';

    /** @var array */
    protected $fillable = [
        'id',
        'payer',
        'payee',
        'value'
    ];
}
