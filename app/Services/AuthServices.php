<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;

class AuthServices
{
    public static function register(array $data)
    {
        try {
            return User::create([
                'name' => $data["name"],
                'email' => $data["email"],
                'password' => Hash::make($data["password"]),
            ]);
        } catch (\Exception $e) {
            throw new ModelNotFoundException("Error creating user: " . $e->getMessage());
        }
    }
}
