<?php

namespace App\Interfaces\Http\Controllers\Contracts\Users;

use App\Application\Requests\Users\RegisterRequest;
use Illuminate\Http\JsonResponse;

/**
 * Class UserControllerInterface
 *
 * @package App\Interfaces\Http\Controllers\Contracts
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface UserControllerInterface
{
    /**
     * @param  \App\Application\Requests\Users\RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse;
}
