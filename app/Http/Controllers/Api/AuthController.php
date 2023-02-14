<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    /**
     * Registers a new user.
     * 
     * @param RegisterUserRequest $request
     */
    public function register(RegisterUserRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
       
        /** @var User $user */
        $user = User::create($data);

        return response()->json([
            'token' => $user->createToken($user->name)->plainTextToken
        ]);
    }

    /**
     * Authenticates an existing user.
     */
    public function login(LoginUserRequest $request)
    {
        if (!Auth::attempt($request->only(['email', 'password'])))
        {
            return response()->json([
                'message' => 'Invalid credentials'
            ]);
        }

        /** @var User $user */
        $user = User::where('email', $request->email)->first();

        return response()->json([
            'token' => $user->createToken($user->name)->plainTextToken
        ]);
    }
}
