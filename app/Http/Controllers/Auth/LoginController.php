<?php

namespace App\Http\Controllers\Auth;

use App\Http\Auth\Requests\LoginApiRequest;
use App\Http\Controllers\Controller;
use App\Services\LoginService;

class LoginController extends Controller
{
    private $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function login(LoginApiRequest $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $token = $this->loginService->login($email, $password);
        return response()->json(['token' => $token],202);
    }

    public function logout()
    {
        $this->loginService->logout();

        return response()->json(null, 204);
    }
}
