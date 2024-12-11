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
            "username" => "required",
            "password" => "required"
        ]);

        $user = User::where("username", $credentials["username"])->first();

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
            'username' => 'bail|required|unique:users',
            'password' => 'bail|required|min:8'
        ]);
        $user = User::create([
            'username' => $registerUserData['username'],
            'password' => Hash::make($registerUserData['password']),
        ]);
        return response()->json([
            'message' => 'Registered successfully.',
            "access_token" => $user->createToken($user->name . "-AuthToken")->plainTextToken
        ]);
    }

    function show(User $user): JsonResponse
    {
        return response()->json([
            "username" => $user->user_name
        ]);
    }
}
