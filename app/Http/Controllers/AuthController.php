<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{


    public function login(Request $request)
    {
        // Handle login logic

        // 1. Validate the request
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);

        // 2. Check if email exists
        $user = User::where('email', $credentials['email'])->first();
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // 3. Generate token
        $token = $user->createToken('auth_token')->plainTextToken;

        // 4. Return token
        return response()->json(['token' => $token, 'user' => $user, 'message' => 'Login successful']);

    }

    public function register(Request $request)
    {
        // Handle registration logic

        // 1. Validate the request
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        // 2. Create the user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // 3. Generate token
        $token = $user->createToken('auth_token')->plainTextToken;

        // 4. Return token
        return response()->json(['token' => $token, 'user' => $user, 'message' => 'Registration successful']);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function logout(Request $request)
    {
        // Handle logout logic
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logout successful']);
    }
}
