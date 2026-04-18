<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 🔐 LOGIN
    public function login(Request $r)
    {
        $user = User::where('email', $r->email)->first();

        if (!$user || !Hash::check($r->password, $user->password)) {
            return response()->json(['message'=>'Login gagal'],401);
        }

        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            'user'=>$user,
            'token'=>$token
        ]);
    }

    // 🔒 REGISTER (ADMIN ONLY)
    public function register(Request $r)
    {
        if ($r->user()->role !== 'admin') {
            return response()->json(['message'=>'Hanya admin'],403);
        }

        $user = User::create([
            'username'=>$r->username,
            'email'=>$r->email,
            'password'=>bcrypt($r->password),
            'role'=>$r->role
        ]);

        return response()->json($user);
    }

    // 🚪 LOGOUT
    public function logout(Request $r)
    {
        $r->user()->tokens()->delete();
        return response()->json(['message'=>'Logout berhasil']);
    }


}
