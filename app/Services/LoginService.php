<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginService
{
    private $guard;

    public function __construct()
    {
        $this->guard = Auth::guard('api');
    }

    /**
     * @param $email
     * @param $password
     * @return string
     * @throws AuthenticationException
     */
    public function login($email, $password)
    {
        $user = User::where('email', $email)
            ->first();

        if ($user == null)
            throw new AuthenticationException('Not found user with given credentials');

        if (!Hash::check($password, $user->password))
            throw new AuthenticationException('Not found user with given credentials');

        $token = $this->generateToken();
        $user->api_token = $token;
        $user->save();

        return $token;
    }

    public function logout()
    {
        $user = $this->guard->user();
        $user->api_token = null;
        $user->save();
    }

    private function generateToken()
    {
        $api_token = str_random(60);
        return $api_token;
    }
}