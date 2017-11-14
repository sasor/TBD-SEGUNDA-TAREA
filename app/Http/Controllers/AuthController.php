<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $r)
    {
        if (Auth::attempt([
                            'username'=>$r->username,
                            'password'=>$r->password
                            ])
            ) {
            return redirect()->route('home');
            //dd('correcto');
        } else {
            //return redirect()->route('login.get');
            dd('error');
        }
    }
}
