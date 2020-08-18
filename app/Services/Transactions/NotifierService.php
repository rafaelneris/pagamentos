<?php

namespace App\Services\Transactions;

use App\Exceptions\TransactionsEmailNotSendedException;
use App\Entities\Transactions\TransactionEntity;
use App\Contracts\Http\Services\ClientServiceInterface;
use App\Contracts\Transactions\Services\NotifierServiceInterface;

/**
 * Class NotifierService
 * @package App\Services\Transactions
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class NotifierService implements NotifierServiceInterface
{
    /** @var \App\Contracts\Http\Services\ClientServiceInterface */
    private $httpClientService;

    /** @var string  */
    private $externalNotifierUri;

    /**
     * NotifierService constructor.
     * @param \App\Contracts\Http\Services\ClientServiceInterface $httpClientService
     * @param string                                              $externalNotifierUri
     */
    public function __construct(ClientServiceInterface $httpClientService, string $externalNotifierUri)
    {
        $this->httpClientService = $httpClientService;
        $this->externalNotifierUri = $externalNotifierUri;
    }

    /**
     * @param \App\Entities\Transactions\TransactionEntity $transactionEntity
     * @return bool
     * @throws \App\Exceptions\TransactionsEmailNotSendedException
     */
    public function notify(TransactionEntity $transactionEntity): bool
    {
        $response = $this->httpClientService->request('GET', $this->externalNotifierUri);
        return $this->validate(json_decode($response->getBody()->getContents(), true));
    }

    /**
     * @param array $response
     * @return bool
     * @throws \App\Exceptions\TransactionsEmailNotSendedException
     */
    private function validate(array $response): bool
    {
        if (!($response['message'] == self::STATUS_NOTIFIED)) {
            throw new TransactionsEmailNotSendedException();
        }

        return true;
    }
}
