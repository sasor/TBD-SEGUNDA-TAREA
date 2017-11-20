<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function usuarios()
    {
        $users = \App\Usuario::all();
        return view('admin.usuarios', ['usuarios'=>$users]);
    }

    public function usuario()
    {
        $roles = \App\Rol::all();
        return view('admin.usuario', ['roles'=>$roles]);
    }

    public function store(Request $request)
    {
        //$input = $request->all();
        //var_dump($input);
        //exit;
        // Recover values POST
        $username = $request->input('username');
        $password = $request->input('password');

        $user = \App\Usuario::create(
                [
                    'username' => $username,
                    'password' => Hash::make($password)
                ]
        );

        if (!empty($request->input('roles'))) {
            $roles = $request->input('roles');
            // cuando el valor es on y cuando no es
            foreach ($roles as $key => $value) {
                if ($value === 'on') {
                    $user->roles()->attach($key, ['activo'=>true]);
                } else {
                    $user->roles()->attach($key, ['activo'=>$value]);
                }
            }
        }
        return redirect()->route('admin.users');
    }

    public function roles()
    {
        $roles = \App\Rol::all();
        return view('admin.roles', ['roles'=>$roles]);
    }
}
