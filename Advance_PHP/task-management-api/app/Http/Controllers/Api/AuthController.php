<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $v = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $u = User::create([
            'name' => $v['name'],
            'email' => $v['email'],
            'password' => Hash::make($v['password']),
        ]);

        $t = $u->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'User registered successfully',
            'token' => $t,
            'user' => $u,
        ], 201);
    }

    public function login(Request $request)
    {
        $v = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $u = User::where('email', $v['email'])->first();

        if (!$u || !Hash::check($v['password'], $u->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $t = $u->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'token' => $t,
            'user' => $u,
        ], 200);
    }

    public function user(Request $request)
    {
        return response()->json([
            'user' => $request->user()
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully'
        ], 200);
    }
}