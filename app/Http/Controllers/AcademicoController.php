<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcademicoController extends Controller
{
    public function proyectos()
    {
        $proyectos = \App\Proyecto::all();
        return view('academico.proyectos', ['proyectos'=>$proyectos]);
    }
}
