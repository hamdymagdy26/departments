<?php

namespace App\Services\Auth;

use App\Repositories\Auth\AuthRepositoryInterface;
use App\Services\Auth\AuthServiceInterface;

class AuthService implements AuthServiceInterface
{

    /** @var DepartmentServiceInterface */
    private $authRepositoryInterface;

    public function __construct(AuthRepositoryInterface $authRepositoryInterface)
    {
        $this->authRepositoryInterface = $authRepositoryInterface;
    }

    public function register($request)
    {
        return $this->authRepositoryInterface->register($request);
    }

    public function login($request)
    {
        return $result = $this->authRepositoryInterface->login($request);
    }

    public function logout()
    {
        return $this->authRepositoryInterface->logout();
    }
}
