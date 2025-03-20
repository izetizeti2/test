<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Register a new user.
     */
        public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone_number' => 'required|string|unique:users|max:20',
            'password' => 'required|string|min:6|confirmed',
            'blood_group_id' => 'required|exists:blood_groups,id',
            'city_id' => 'required|exists:cities,id',
            'address' => 'required|string|max:255',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'surname' => $validatedData['surname'],
            'phone_number' => $validatedData['phone_number'],
            'password' => bcrypt($validatedData['password']),
            'blood_group_id' => $validatedData['blood_group_id'],
            'city_id' => $validatedData['city_id'],
            'role_id' => 4, // Vendoset automatikisht si role_id = 4
            'address' => $validatedData['address'],
        ]);

        $token = auth()->attempt(['phone_number' => $user->phone_number, 'password' => $request->password]);

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ], 201);
    }


    /**
     * Login a user.
     */
    public function login(Request $request)
    {
        $credentials = $request->only('phone_number', 'password');

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated user.
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Logout the user.
     */
    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Return token response.
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
