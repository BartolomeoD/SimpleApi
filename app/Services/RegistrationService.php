<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationService
{
    public function register($name, $email, $password) {
        $newUser = new User();
        $newUser->name = $name;
        $newUser->email = $email;
        $newUser->password = Hash::make($password);

        $newUser->save();
    }
}