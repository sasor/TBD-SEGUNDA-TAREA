@extends('master')
@section('title', 'Acciones | TBD')
@section('content')
<div class="columns">
  <div class="column is-three-fifths is-offset-one-fifth">
    <div class="panel">
      <div class="panel-heading">
        <span><i class="fa fa-tasks"></i>Acciones</span>
      </div>
      <div class="panel-block">
        <ul class="menu-list">
          @forelse ($funciones as $funcion)
            <li><a href="#">{{ $funcion->name  }}</a></li>
          @empty
            <li>No Hay Funciones</li>
          @endforelse
        </ul> 
      </div>
    </div>
  </div>
</div>
@endsection
