<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function usuarios()
    {
        $users = \App\Usuario::all();
        return view('admin.usuarios', ['usuarios'=>$users]);
    }
}
