@extends('master')
@section('title', 'Proyectos | TBD')
@section('content')
<div class="columns">
  <div class="column is-10 is-offset-1">
    @if (count($proyectos) === 0)
      <div class="tile">
        No tienes Proyectos
      </div>
    @else
      <table class="table ">
        <thead>
          <tr>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
          </tr>
        </tbody>
      </table>
    @endif
  </div>
</div>
@endsection
