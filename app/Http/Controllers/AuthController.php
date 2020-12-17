<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AuthController extends Controller
{
    public function getLogin()
    {
    	return view("auth.login");
    }

    public function postLogin(Request $request)
    {
    	// dd($request);
    	$this->validate($request, [
    		'username' => 'required',
    		'password' => 'required',
    	]);

    	$credentials = [
    		'username' => $request->username,
    		'password' => $request->password,
    	];

    	// dd(Auth::attempt($credentials));

    	if (Auth::attempt($credentials)) {
    		return redirect()->route("dashboard");
    	}else{
            $username = User::where('username', $request->username)->first();
            $password = User::where('password', $request->password)->first();

            if (!$username && !$password) {
                return redirect()->back()->with('msgWarning','Akun tidak ditemukan');
            } else if(!$username) {
                return redirect()->back()->with('msgWarning','Username Tidak Cocok');
            }
            else if (!$password) {
                return redirect()->back()->with('msgWarning','Password Tidak Cocok');
            }
    	}
    }
}
