<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function registerView(Request $request)
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:255', 'alpha_dash', 'unique:users,username'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8','max:16'],
            'passwordAgain' => ['required', 'string', 'min:8','max:16'],
        ], [], [
            'username' => 'Kullanıcı adı',
            'email' => 'Email',
            'password' => 'Şifre',
            'passwordAgain' => 'Şifre',
        ]);

        if ($validator->fails()) {

            $error = $validator->messages();
        }
        return view('register');
    }


    public function loginView(Request $request)
    {
        return view('register');
    }

    public function login(Request $request)
    {
        return view('register');
    }
}
