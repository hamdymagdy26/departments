<?php

namespace App\Repositories\Auth;

use App\Models\User;
use Illuminate\Support\Collection;
use JWTAuth;
use Auth;

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
        $token = null;
        // if the response doesn't have token send error msg
        if(JWTAuth::attempt($request->only('email', 'password')) == false) 
        {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ],401);
        }else{
            $token = JWTAuth::attempt($request->only('email', 'password'));
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
    public function logout()
    {
        return Auth::guard()->logout();
    }
}
