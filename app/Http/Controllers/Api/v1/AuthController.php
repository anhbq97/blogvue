<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $response = [
            'data' => [],
            'messasge' => 'Tạo tài khoản thất bại.'
        ];

        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->mixedCase()->numbers()->symbols()
            ]
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());       
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        if ($user) {
            $token = $user->createToken('auth_token')->plainTextToken;

            $response['data'] = [
                'user' => $user,
                'access_token' => $token, 
                'token_type' => 'Bearer'
            ];

            $response['message'] = 'Tạo tài khoản thanh cong. Cần đợi admin Kích hoạt!';
        }
        
        return response()->json($response);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }

        $response = [
            'data' => [],
            'code' => 400,
            'error_code' => 0,
            'message' => 'Something Wrong!'
        ];

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        if ($token) {
            $response['data']['user'] = [
                'email' => $user->email,
                'name' => $user->name
            ];
            $response['data']['access_token'] = $token;
            $response['data']['token_type'] = 'Bearer';
            $response['code'] = 200;
            $response['message'] = 'Login Success';
        }

        return response()->json($response);
    }

    public function logout(Request $request)
    {
        $response = [
            'data' => [],
            'code' => 400,
            'error_code' => 0,
            'message' => 'Something Wrong!'
        ];

        $user = Auth::user();
        
        if ($user->currentAccessToken()->delete()) {
            $response['message'] = 'Logout success. Bye ' . $request->user()->name;
            $response['code'] = 200;
        }

        return response()->json($response);
    }

    public function getTokens()
    {
        // Auth::user()->tokens->each(function($token, $key) {
        //     $token->delete();
        // });

        return response()->json(Auth::user()->tokens);
    }
}
