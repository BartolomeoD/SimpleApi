<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginApiRequest;
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

        return $this->response($this->loginService->login($email, $password));
    }

    public function logout()
    {
        $this->loginService->logout();

        return $this->response(null, 204);
    }
}
