<?php

namespace App\Contracts\Transactions\Services;

use App\Entities\Transactions\TransactionEntity;

/**
 * Class ValidatorFactoryMethodInterface
 * @package App\Contracts\Transactions\Services
 * @author Rafael Neris <rafaelnerisdj@gmail.com
 */
interface ValidatorFactoryMethodInterface
{
    public function factory(TransactionEntity $transactionEntity): ValidatorServiceInterface;
}
