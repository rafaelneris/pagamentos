<?php

namespace App\Infrastructure\Contracts\Http;

use Psr\Http\Message\ResponseInterface;

/**
 * Interface ClientServiceInterface
 * @package App\Infrastructure\Contracts\Http
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface ClientServiceInterface
{
    public function request(string $method, string $resource, array $configs = []): ResponseInterface;
}
