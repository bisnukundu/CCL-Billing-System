<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ResponseHelper;

    function login(LoginRequest $request)
    {
        $request->validated();

        try {
            $credentials = ['email' => $request->email, 'password' => $request->password];

            if (!$token = auth()->attempt($credentials)) {
                return $this->response_helper('Unauthorized', 401);
            }
            return $this->respondWithToken($token);

        } catch (\Exception $err) {
            return $this->response_helper($err->getMessage(), 500);
        }
    }

    function register(RegisterRequest $request)
    {
        $request->validated();
        try {
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'name' => $request->name,
                'nid' => $request->nid,
                'mobile' => $request->mobile,
                'role' => $request->role
            ]);
            return (new UserResource($user))->additional(['message' => 'User register successfully']);
        } catch (\Exception $err) {
            return $this->response_helper($err->getMessage());
        }
    }

    public function logout()
    {
        auth()->logout();
        return $this->response_helper('Successfully logged out', 200);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60 * 24
        ]);
    }
}
