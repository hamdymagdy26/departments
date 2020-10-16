<?php

namespace App\Services\Auth;

use App\Repositories\Auth\AuthRepositoryInterface;
use App\Services\Auth\AuthServiceInterface;
use App\Traits\General\ResponseHandler\ResponseHandler;
use Illuminate\Support\Collection;

class AuthService implements AuthServiceInterface
{
    use ResponseHandler;

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
        return $this->authRepositoryInterface->login($request);
    }

    public function getUser($request)
    {
        return $this->authRepositoryInterface->getUser($request);
    }

    public function logout($request)
    {
        return $this->authRepositoryInterface->logout($request);
    }
}
