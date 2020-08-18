<?php

namespace App\Services\Transactions;

use App\Exceptions\TransactionNotAuthorizedException;
use App\Entities\Transactions\TransactionEntity;
use App\Contracts\Http\Services\ClientServiceInterface;
use App\Contracts\Transactions\Services\AuthorizerServiceInterface;

/**
 * Class AuthorizerService
 * @package App\Services\Transactions
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class AuthorizerService implements AuthorizerServiceInterface
{
    /** @var \App\Contracts\Http\Services\ClientServiceInterface */
    private $clientService;

    /** @var string */
    private $authorizerUri;

    /**
     * AuthorizerService constructor.
     * @param \App\Contracts\Http\Services\ClientServiceInterface $clientService
     * @param string                                              $authorizerUri
     */
    public function __construct(ClientServiceInterface $clientService, string $authorizerUri)
    {
        $this->clientService = $clientService;
        $this->authorizerUri = $authorizerUri;
    }

    /**
     * @inheritDoc
     * @throws \App\Exceptions\TransactionNotAuthorizedException
     */
    public function authorize(TransactionEntity $transactionEntity): bool
    {
        /** @var string $jsonResponse */
        $jsonResponse = $this->clientService->request('GET', $this->authorizerUri)->getBody()->getContents();
        return $this->validate(json_decode($jsonResponse, true));
    }

    /**
     * @param array $response
     * @return bool
     * @throws \App\Exceptions\TransactionNotAuthorizedException
     */
    private function validate(array $response): bool
    {
        if (!($response['message'] === self::STATUS_AUTHORIZED)) {
            throw new TransactionNotAuthorizedException();
        }

        return true;
    }
}
