<?php

namespace App\Domain\Transactions\Services;

use App\Application\Exceptions\TransactionsEmailNotSendedException;
use App\Domain\Transactions\Entities\TransactionEntity;
use App\Infrastructure\Contracts\Http\ClientServiceInterface;
use App\Domain\Transactions\Contracts\Services\NotifierServiceInterface;

/**
 * Class NotifierService
 * @package App\Domain\Transactions\Services
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class NotifierService implements NotifierServiceInterface
{
    /** @var \App\Infrastructure\Contracts\Http\ClientServiceInterface */
    private $httpClientService;

    /** @var string  */
    private $externalNotifierUri;

    /**
     * NotifierService constructor.
     * @param \App\Infrastructure\Contracts\Http\ClientServiceInterface $httpClientService
     * @param string                                              $externalNotifierUri
     */
    public function __construct(ClientServiceInterface $httpClientService, string $externalNotifierUri)
    {
        $this->httpClientService = $httpClientService;
        $this->externalNotifierUri = $externalNotifierUri;
    }

    /**
     * @param \App\Domain\Transactions\Entities\TransactionEntity $transactionEntity
     * @return bool
     * @throws \App\Application\Exceptions\TransactionsEmailNotSendedException
     */
    public function notify(TransactionEntity $transactionEntity): bool
    {
        $response = $this->httpClientService->request('GET', $this->externalNotifierUri);
        return $this->validate(json_decode($response->getBody()->getContents(), true));
    }

    /**
     * @param array $response
     * @return bool
     * @throws \App\Application\Exceptions\TransactionsEmailNotSendedException
     */
    private function validate(array $response): bool
    {
        if (!($response['message'] == self::STATUS_NOTIFIED)) {
            throw new TransactionsEmailNotSendedException();
        }

        return true;
    }
}
