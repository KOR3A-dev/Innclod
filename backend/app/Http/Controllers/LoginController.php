<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Autenticación exitosa',
            ]);
        }
        return response()->json([
            'error' => 'Las credenciales ingresadas no son válidas.',
        ], 401);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Logout exitoso']);
    }
}
