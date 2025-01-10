<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $authService;

    public function __construct(
        AuthService $authService,
    ) {
        $this->authService = $authService;
    }

    public function login(LoginRequest $loginRequest)
    {
        $response = $this->authService->login($loginRequest->all());
        if (!$response)
            return response()->json(['error' => 'Credenciais incorrectas'], 422);

        return response()->json(['token_name' => $response], 200);
    }
}
