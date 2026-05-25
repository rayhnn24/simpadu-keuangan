<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Register user
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = $user->createToken(
            'auth_token'
        )->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Register berhasil',
            'token' => $token,
            'data' => $user
        ], 201);
    }

    /**
     * Login user
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where(
            'email',
            $request->email
        )->first();

        // cek email
        if (!$user) {

            return response()->json([
                'success' => false,
                'message' => 'Email tidak ditemukan'
            ], 401);
        }

        // cek password
        if (!Hash::check(
            $request->password,
            $user->password
        )) {

            return response()->json([
                'success' => false,
                'message' => 'Password salah'
            ], 401);
        }

        // generate token
        $token = $user->createToken(
            'auth_token'
        )->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login berhasil',
            'token' => $token,
            'data' => $user
        ]);
    }

    /**
     * Data user login
     */
    public function me(Request $request)
    {
        return response()->json([
            'success' => true,
            'data' => $request->user()
        ]);
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        $request
            ->user()
            ->currentAccessToken()
            ->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logout berhasil'
        ]);
    }
}