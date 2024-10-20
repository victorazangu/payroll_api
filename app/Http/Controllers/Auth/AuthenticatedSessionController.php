<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
        $user = Auth::user();
        $token = $user->createToken('token')->accessToken;
        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
        ], 200);
    }
    public function destroy(Request $request)
    {
        $user = Auth::user();
        $request->user()->token()->revoke();

        return response()->json(['message' => 'Logout successful'], 200);
    }
}
