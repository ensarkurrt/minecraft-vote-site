<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Rules\Password;
use Illuminate\Validation\ValidationException;

class AccountController extends Controller
{
    public function index(Request $request){
        return view('cp.account');
    }

    public function changeUsername(Request $request){
        $user = $request->user();

       $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:255', Rule::unique('users','username')->ignore($user->id,'id') , 'alpha_dash'],
            'password' => new Password(),
        ])->validate();

        if($user->username == $request->username){
            throw ValidationException::withMessages(['message' => 'Zaten mevcut kullanıcı adınız '. $request->username]);
        }

        $myUser = User::find($user->id);

        if(!Hash::check($request->password, $myUser->password)){
            throw ValidationException::withMessages(['message' => 'Şifreniz doğru değil!']);
            //return view('cp.account', compact('errors'));
        }

        $myUser->username = $request->username;
        $myUser->save();
        return redirect()->route('account')->with('success','İşlem başarılı!');
    }

    public function changePassword(Request $request){
        $user = $request->user();

       $validator = Validator::make($request->all(), [
           'password' => new Password(),
           'new_password' => new Password(),
           'new_password_again' => new Password(),
        ])->validate();

        $myUser = User::find($user->id);

        if(!Hash::check($request->password, $myUser->password)){
            throw ValidationException::withMessages(['message' => 'Mevcut şifreniz doğru değil!']);
        }

        if($request->new_password != $request->new_password_again){
            throw ValidationException::withMessages(['message' => 'Yeni şifreleriniz uyuşmuyor!']);
        }

        $myUser->password = Hash::make($request->new_password);
        $myUser->save();
        return redirect()->route('account')->with('success','İşlem başarılı!');
    }
}
