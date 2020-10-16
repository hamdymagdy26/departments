<?php

namespace App\Repositories\Auth;

use Illuminate\Support\Collection;

interface AuthRepositoryInterface
{
    public function register($request);

    public function login($request);

    public function getUser($request);

    public function logout($request);

}
