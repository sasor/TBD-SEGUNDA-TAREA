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

    public function proyecto()
    {
        $tipos = \App\TipoProyecto::all();
        $dependencias = \App\DependenciaAcademica::all();
        $areas = \App\AreaAcademica::all();
        return view('academico.proyecto', [
            'tipos' => $tipos,
            'dependencias' => $dependencias,
            'areas' => $areas
        ]);
    }
}
