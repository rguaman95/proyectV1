@extends('layouts.app')

@section('content')
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        @can('Enlistar Roles')
        <a class="nav-link active" aria-current="page" href="{{ route('role.index') }}">Roles <i class="bi bi-person"></i></a>
        @endcan
        @can('Enlistar Permisos')
        <a class="nav-link" href="{{ route('permission.index') }}">Permisos <i class="bi bi-list-task"></i></a>
        @endcan
        @can('Enlistar Usuarios')
        <a class="nav-link" href="{{ route('useradmin.index') }}">Usuarios <i class="bi bi-people"></i></a>
        @endcan
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </div>
    </div>
  </div>
</nav>
@yield('admincontent')
</div>
@endsection