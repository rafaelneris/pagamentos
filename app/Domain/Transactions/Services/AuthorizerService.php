<?php

namespace App\Domain\Transactions\Services;

use App\Application\Exceptions\TransactionNotAuthorizedException;
use App\Domain\Transactions\Entities\TransactionEntity;
use App\Infrastructure\Contracts\Http\ClientServiceInterface;
use App\Domain\Transactions\Contracts\Services\AuthorizerServiceInterface;

/**
 * Class AuthorizerService
 * @package App\Domain\Transactions\Services
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class AuthorizerService implements AuthorizerServiceInterface
{
    /** @var \App\Infrastructure\Contracts\Http\ClientServiceInterface */
    private $clientService;

    /** @var string */
    private $authorizerUri;

    /**
     * AuthorizerService constructor.
     * @param \App\Infrastructure\Contracts\Http\ClientServiceInterface $clientService
     * @param string                                              $authorizerUri
     */
    public function __construct(ClientServiceInterface $clientService, string $authorizerUri)
    {
        $this->clientService = $clientService;
        $this->authorizerUri = $authorizerUri;
    }

    /**
     * @inheritDoc
     * @throws \App\Application\Exceptions\TransactionNotAuthorizedException
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
     * @throws \App\Application\Exceptions\TransactionNotAuthorizedException
     */
    private function validate(array $response): bool
    {
        if (!($response['message'] === self::STATUS_AUTHORIZED)) {
            throw new TransactionNotAuthorizedException();
        }

        return true;
    }
}
