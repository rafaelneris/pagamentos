<?php

namespace App\Domain\Transactions\Contracts\Services;

use App\Domain\Transactions\Entities\TransactionEntity;

/**
 * Class ValidatorFactoryMethodInterface
 * @package App\Domain\Transactions\Contracts\Services
 * @author Rafael Neris <rafaelnerisdj@gmail.com
 */
interface ValidatorFactoryMethodInterface
{
    public function factory(TransactionEntity $transactionEntity): ValidatorServiceInterface;
}
