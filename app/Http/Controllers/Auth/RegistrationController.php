<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationApiRequest;
use App\Services\LoginService;
use App\Services\RegistrationService;

class RegistrationController extends Controller
{
    private $registrationService;
    private $loginService;

    public function __construct(RegistrationService $registrationService, LoginService $loginService)
    {
        $this->registrationService = $registrationService;
        $this->loginService = $loginService;
    }

    public function register(RegistrationApiRequest $request)
    {
        $this->registrationService->register($request['name'], $request['email'], $request['password']);
        $token = $this->loginService->login($request['email'], $request['password']);
        return response()->json(['token' => $token], 201);
    }
}