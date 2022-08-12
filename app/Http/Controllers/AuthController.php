<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email'    => 'email|required',
            'password' => 'required'
        ]);

        if(!auth()->attempt($data))
        {
            return response()->json(['message' => 'invalid credentials'],500);
        }

        $token = auth()->user()->createToken('authToken')->accessToken;

        return response()->json([
            'user' => auth()->user(),
            'token' => $token
        ]);

    }
}
