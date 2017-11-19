@extends('master')
@section('title', 'Home | TBD')
@section('content')
  <div class="columns">
    <div class="column is-three-fifths is-offset-one-fifth">
      <div class="panel">
        <div class="panel-heading">
          <span><i class="fa fa-users"></i>Roles</span>
        </div>
        <div class="panel-block">
          <ul class="menu-list">
            @foreach ($roles as $rol)
              <li><a href="{{ $rol->id }}">{{ $rol->name  }}</a></li>
            @endforeach
          </ul> 
        </div>
      </div>
    </div>
  </div>
@endsection
