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
            'username' => ['required', 'string'],
            'password' => ['required', 'min:8'],
        ]);

        // 2. Check if username exists
        $user = User::where('username', $credentials['username'])->first();
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
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'roles' => ['required', 'string', 'in:ADMIN,USER'],
        ]);

        // 2. Create the user
        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'roles' => $data['roles'],
            'password' => Hash::make($data['password']),
        ]);

        // 3. Generate token
        $token = $user->createToken('auth_token')->plainTextToken;

        // 4. Return token
        return response()->json([
            'token' => $token,
            'user' => $user,
            'message' => 'Registration successful'
        ]);
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
