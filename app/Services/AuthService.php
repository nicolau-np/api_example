<?php

namespace App\Services;

use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    protected $authRepository;

    public function __construct(
        AuthRepository $authRepository
    ) {
        $this->authRepository = $authRepository;
    }

    public function logout()
    {
        $this->authRepository->logout();
    }

    public function login(array $data)
    {
        $credentials = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];

        $remember = isset($data['remember']) ? true : false;

        $auth = $this->authRepository->login($credentials, $remember);
        if ($auth) {
            $user = Auth::user();
            $token =  $user->createToken('token_name');
            $response = [
                'user' => $user,
                'token' => $token->plainTextToken,
            ];

            return $response;
        }

        return false;
    }
}
