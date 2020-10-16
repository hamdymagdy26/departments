<?php

namespace App\Services\Auth;

use Illuminate\Support\Collection;

interface AuthServiceInterface
{
    public function register($request);

    public function login($request);

    public function logout();
}
