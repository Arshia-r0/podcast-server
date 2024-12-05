<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{

    function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            "user_name" => "required",
            "password" => "required"
        ]);

        $user = User::where("user_name", $credentials["user_name"])->first();

        if (!$user || !Hash::check($credentials["password"], $user->password)) {
            return response()->json([
                "message" => "The provided credentials are incorrect."
            ], 401);
        }

        return response()->json([
            "message" => "Logged in successfully.",
            "access_token" => $user->createToken($user->name . "-AuthToken")->plainTextToken
        ]);
    }

    function logout(): JsonResponse
    {
        auth()->user()->tokens()->delete();
        return response()->json(["message" => "Logged out successfully."]);
    }

    function register(Request $request): JsonResponse
    {
        $registerUserData = $request->validate([
            'user_name' => 'bail|required|unique:users',
            'password' => 'bail|required|min:8'
        ]);
        $user = User::create([
            'user_name' => $registerUserData['user_name'],
            'password' => Hash::make($registerUserData['password']),
        ]);
        return response()->json([
            'message' => 'Registered successfully.',
            "access_token" => $user->createToken($user->name . "-AuthToken")->plainTextToken
        ]);
    }

}
