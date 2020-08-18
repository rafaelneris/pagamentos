<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Transactions
 * @package App\Model
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
