<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function store_proyecto(Request $request)
    {
        //$input = $request->all();
        //var_dump($input);
        $titulo = $request->input('titulo');
        $resumen = $request->input('resumen');
        $tipo = $request->input('tipo');
        $dependencia = $request->input('dependencia');
        $area = $request->input('area');
        //var_dump($titulo,$resumen,$tipo,$dependencia,$area);

        $proyecto = \App\Proyecto::create([
            'tipo_proyecto_id' => $tipo,
            'dependencia_academica_id' => $dependencia,
            'proyecto_status_id' => 5, // por defecto el status es pendiente verificacion
            'area_academica_id' => $area
        ]);

        $id = Auth::User()->id;

        // fill proyecto_usuario
        $proyecto->usuarios()->attach($id, ['activo'=>true]);

        // fill proyecto_detalle
        \App\ProyectoDetalle::create([
            'proyecto_id' => $proyecto->id,
            'titulo_proyecto' => $titulo,
            'resumen_proyecto' => $resumen
        ]);

        return redirect()->route('academico.proyectos');
    }
}
