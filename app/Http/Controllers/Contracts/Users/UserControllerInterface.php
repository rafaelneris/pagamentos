<?php

namespace App\Http\Controllers\Contracts\Users;

use App\Http\Requests\Users\RegisterRequest;
use Illuminate\Http\JsonResponse;

/**
 * Class UserControllerInterface
 *
 * @package App\Http\Controllers\Contracts
 * @author  Rafael Neris <rafaelnerisdj@gmail.com>
 */
interface UserControllerInterface
{
    /**
     * @param  \App\Http\Requests\Users\RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse;
}
