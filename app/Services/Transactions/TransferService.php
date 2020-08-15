<?php

namespace App\Services\Transactions;

use App\Services\Contracts\Transactions\TransferServiceInterface;
use App\Services\Users\BalanceService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class TransferService
 * @package App\Services\Transactions
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransferService implements TransferServiceInterface
{
    /** @var \App\Services\Users\BalanceService */
    private $balanceService;

    /**
     * TransferService constructor.
     * @param \App\Services\Users\BalanceService $balanceService
     */
    public function __construct(BalanceService $balanceService)
    {
        $this->balanceService = $balanceService;
    }

    /**
     * @param array $transferData
     * @return bool
     */
    public function transfer(array $transferData)
    {
        try {
            DB::beginTransaction();
            $this->balanceService->withDraw($transferData['payer'], $transferData['value']);
            $destinData = ['userId' => $transferData['payee'], 'value' => $transferData['value']];
            $this->balanceService->deposit($destinData);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
        }
    }


}
