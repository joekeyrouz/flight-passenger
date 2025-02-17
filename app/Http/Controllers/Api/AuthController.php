<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:10',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        $user->assignRole('user');

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'message' => 'Registration successful',
            'token'   => $token
        ]);
    }

    public function login(Request $request){
        $data = $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if(!$user || ($request->password != $user->password)){
            return[
                'message' => 'not correct credentials'
            ];
        }

        $token = $user->createToken('authToken')->plainTextToken;
        return[
            'message' => 'Logged In',
            'user' => $user,
            'token' => $token
        ];
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out']);
    }
}
