<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // 🔐 LOGIN
    public function login(Request $request)
    {
        $request->validate([
    'email' => 'required|email',
    'password' => 'required'
    ]);

        $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json([
            'message' => 'Email atau password salah'
        ], 401);
    }


    $token = $user->createToken('token')->plainTextToken;

    return response()->json([
        'token' => $token
    ]);
    }

    // 🔒 REGISTER (ADMIN ONLY)
    public function register(Request $r)
    {
       $r->validate([
        'username' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'role' => 'required'
    ]);

    if ($r->user()->role !== 'admin') {
        return response()->json([
            'message' => 'Hanya admin yang dapat mendaftarkan user'
        ], 403);
    }

    $user = User::create([
        'username' => $r->username,
        'email' => $r->email,
        'password' => bcrypt($r->password),
        'role' => $r->role,
    ]);

    return response()
        ->json([
            'message' => 'User berhasil didaftarkan',
            'data' => $user
        ])
        ->setStatusCode(201);

    }

    // 🚪 LOGOUT
    public function logout(Request $r)
    {
        $r->user()->tokens()->delete();
        return response()->json(['message'=>'Logout berhasil']);
    }
}
