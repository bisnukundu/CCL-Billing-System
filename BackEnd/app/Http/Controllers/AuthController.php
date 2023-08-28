<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => [], 'message' => $validator->errors()], 422);
        }

        try {
            $credentials = ['email' => $request->email, 'password' => $request->password];

            if (!$token = auth()->attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            return $token;

        } catch (\Exception $err) {
            return response()->json(['data' => [], 'message' => $err->getMessage()], 500);
        }


    }

    function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'name' => 'required|string',
            'nid' => 'numeric',
            'mobile' => 'required|string|unique:users'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => [], 'message' => $validator->errors()], 422);
        }
        try {
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'name' => $request->name,
                'nid' => $request->nid,
                'mobile' => $request->mobile,
                'role' => $request->role
            ]);

            return response()->json(['data' => $user, 'message' => 'User register successfully']);
        } catch (\Exception $err) {
            return response()->json(['data' => [], 'message' => $err->getMessage()], 500);
        }


    }
}
