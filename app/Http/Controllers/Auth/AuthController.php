<?php

namespace App\Http\Controllers\Auth;

use App\Services\Auth\AuthServiceInterface;
use App\Services\Auth\AuthService;
use App\Http\Controllers\Controller;
use App\Traits\General\ResponseHandler\ResponseHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRegisterRequest;

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
     * @param Request
     */
    public function register(AuthRegisterRequest $authRegisterRequest)
    {
        $data = $this->authServiceInterface->register($authRegisterRequest);
        return $this->successResponse([$data], 200);
    }

    /**
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $data = $this->authServiceInterface->login($request);
        return $this->successResponse([$data], 200);
    }

    /**
     * @return JsonResponse
     * @param Request
     */
    public function getUser(Request $request)
    {
        $data = $this->authServiceInterface->getUser($request);
        return $this->successResponse([$data], 200);
    }

    /**
     * @return JsonResponse
     * @param Request
     */
    public function logout(Request $request)
    {
        $data = $this->authServiceInterface->logout($request);
        return $this->successResponse([$data], 200);
    }
}
