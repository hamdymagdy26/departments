<?php

namespace App\Repositories\Auth;

use App\Models\User;
use Illuminate\Support\Collection;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class AuthRepository implements AuthRepositoryInterface
{
    /** @var Auth */
    private $model;

    /**
     * AuthRepository constructor.
     * @param Auth $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * @return Collection
     * @param Request
     */
    public function register($request)
    {
        $validated = $request->validated();
        return $this->model->create([
            'name' => $request->get('name'),
            'password' => bcrypt($request->get('password')),
            'email' => $request->get('email')
        ]);
    }

    /**
     * @return Collection
     * @param Request
     */
    public function login($request)
    {
        $userInfo = $request->only('email', 'password');
        $token = null;
        if(JWTAuth::attempt($userInfo) == false) // if the response doesn't have token send error msg
        {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], Response::HTTP_UNAUTHORIZED);
        }else{
            $token = JWTAuth::attempt($userInfo);
            return response()->json([
                'success' => true,
                'token' => $token,
            ]);
        }        
    }

    /**
     * @return Collection
     * @param Request
     */
    public function getUser($request)
    {
        $user = JWTAuth::authenticate($request->token);
 
        return response()->json(['user' => $user]);
    }

    /**
     * @return Collection
     * @param Request
     */
    public function logout($request)
    {
        try {
            JWTAuth::invalidate($request->token);
 
            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
