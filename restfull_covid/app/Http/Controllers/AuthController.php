<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validasi = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'name.required' => 'Masukan nama Anda !',
                'email.requird' => 'Masukan email anda !',
                'email.email' => 'Format email anda salah !',
                'password.requird' => 'Masukan password anda !'

            ]
        );

        if ($validasi->fails()) {
            $data = [
                'massege' => 'Data Tidak berhasil diinput',
                'data' => $validasi->errors()
            ];
            return response()->json($data, 404);
        } else {
            $input = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];
            $register = User::create($input);

            $data = [
                'massege' => 'Register is created Successfully',
                'data' => $register,
            ];
            return response()->json($data, 200);
        }
    }

    public function login(Request $request)
    {
        $input = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $user = User::where('email', $input['email'])->first();

        $isLoginSuccessfully = ($input['email'] == $user->email && Hash::check($input['password'], $user->password));

        if ($isLoginSuccessfully) {
            # membuat token
            $token = $user->createToken('auth_token');

            $data = [
                'message' => 'Login Succesfully',
                'token' => $token->plainTextToken,
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Email or Password wrong'
            ];

            return response()->json($data, 401);
        }
    }
}