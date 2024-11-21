<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Services\AuthServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('Token de Acesso')->plainTextToken;

        return response()->json(['token' => $token], 200);

    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout realizado com sucesso'], 200);
    }

    public function register(RegisterUserRequest $request): JsonResponse
    {
        $user = AuthServices::register($request->validated());

        $token = $user->createToken('Token de Acesso')->plainTextToken;

        return response()->json(['token' => $token], 201);
    }

    public function me(Request $request): JsonResponse
    {
        $me = Auth::user();
        return response()->json($me, 200);
    }
}
