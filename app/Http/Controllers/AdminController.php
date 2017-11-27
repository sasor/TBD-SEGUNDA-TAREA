<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function usuarios()
    {
        $data = [];
        $users = \App\Usuario::all();

        foreach ($users as $user) {
            $roles = '';
            foreach ($user->roles as $rol) {
                $roles .= ','.$rol->name;
            }

            array_push($data, [
                'usuario'=> $user,
                'roles'=> (!empty($roles)? $roles : 'Sin Roles')
            ]);
        }

        return view('admin.usuarios', ['usuarios'=>$data]);
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

    public function role()
    {
        $funciones = \App\Funcion::all();
        return view('admin.rol', ['funciones'=>$funciones]);
    }

    public function store_role(Request $request)
    {
        $add = $request->input('rol_name');
    
        $rol = \App\Rol::create([
            'name'=>$add 
        ]);

        if (!empty($request->input('funciones'))) {
            $funciones = $request->input('funciones');
            // cuando el valor es on y cuando no es
            foreach ($funciones as $key => $value) {
                if ($value === 'on') {
                    $rol->funciones()->attach($key, ['activo'=>true]);
                } else {
                    $rol->funciones()->attach($key, ['activo'=>$value]);
                }
            }
        }
        return redirect()->route('admin.roles');
    }

    public function show_rol($id)
    {
        $rol = \App\Rol::find($id);
        $funciones_id = [];

        foreach ($rol->funciones as $funcion) {
            array_push($funciones_id, $funcion->id);
        }

        $funciones = \App\Funcion::all();
        return view('admin.update_rol', [
            'rol' => $rol,
            'rol_funcion' => $funciones_id,
            'funciones' => $funciones
        ]);
    }

    public function update_rol(Request $request, $id)
    {
        /*$inputs = $request->all();
        var_dump($inputs);
        exit;*/

        // https://stackoverflow.com/questions/24702640/laravel-save-update-many-to-many-relationship
        // https://stackoverflow.com/questions/40572382/laravel-update-many-to-many-foreign-key-record
        // https://laracasts.com/discuss/channels/eloquent/how-to-update-many-to-many-relationships-pivot-table
        $rol = \App\Rol::find($id);
        $rol->funciones()->detach();

        if (!empty($request->input('funciones'))) {
            $funciones = $request->input('funciones');
            foreach ($funciones as $key => $value) {
                /*if ($value != 'null' && $value != 'on') {
                    $rol->funciones()->sync($key, ['activo' => $value]);
                } 
                elseif ($value == 'on') {
                    $rol->funciones()->attach($key, ['activo' => true]);
                } else {
                    $rol->funciones()->attach($key, ['activo'=>$value]);
                }*/
                if ($value == 'on') {
                    $rol->funciones()->attach($key, ['activo' => true]);
                } elseif ($value != 'null') {
                    $rol->funciones()->attach($key, ['activo' => $value]);
                }
            }
        }
        return redirect()->route('admin.roles');
    }
}
