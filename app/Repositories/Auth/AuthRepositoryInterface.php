<?php

namespace App\Repositories\Auth;

use Illuminate\Support\Collection;

interface AuthRepositoryInterface
{
    public function register($request);

    public function login($request);

    public function logout();

}
