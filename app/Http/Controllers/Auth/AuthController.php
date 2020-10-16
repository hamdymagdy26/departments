<?php

namespace App\Http\Controllers\Auth;

use App\Services\Auth\AuthServiceInterface;
use App\Http\Controllers\Controller;
use App\Traits\General\ResponseHandler\ResponseHandler;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRegisterRequest;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    use ResponseHandler;

    /** @var AuthService */
    private $authServiceInterface;

    /**
     * AuthController constructor.
     * @param AuthServiceInterface $authServiceInterface
     */
    public function __construct(AuthServiceInterface $authServiceInterface)
    {
        $this->authServiceInterface = $authServiceInterface;
    }

    /**
     * @return JsonResponse
     * @param AuthRegisterRequest
     */
    public function register(AuthRegisterRequest $authRegisterRequest)
    {
        $data = $this->authServiceInterface->register($authRegisterRequest);
        return $this->successResponse([$data], 200);
    }

    /**
     * @return JsonResponse
     * @param LoginRequest
     */
    public function login(LoginRequest $request)
    {
        $data = $this->authServiceInterface->login($request);
        return $this->successResponse([$data], 200);
    }

    /**
     * @return JsonResponse
     */
    public function logout()
    {
        $data = $this->authServiceInterface->logout();
        return $this->successResponse([$data], 200);
    }
}
