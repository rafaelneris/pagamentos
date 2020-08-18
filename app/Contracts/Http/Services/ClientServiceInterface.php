<?php

namespace App\Contracts\Http\Services;

use Psr\Http\Message\ResponseInterface;

/**
 * Interface ClientServiceInterface
 * @package App\Contracts\Http\Services
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface ClientServiceInterface
{
    public function request(string $method, string $resource, array $configs = []): ResponseInterface;
}
