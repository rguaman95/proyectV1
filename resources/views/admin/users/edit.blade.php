@extends('admin.index')

@section('admincontent')
<form action="{{ route('useradmin.update',\Crypt::encryptString($user->id)) }}" method="POST">
@csrf
@method('PUT')

<div class="col-md-6">
    <div class="mt-5">
        <div class="mb-2 text-right">
            <button type="reset" class="btn btn-warning">Resetear</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        <div class="card">
            <div class="card-header">
                <h6>Editar Usuario {{ $user->name }}</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="nameuser" placeholder="Nombre Usuario" value="{{ $user->name }}" required>
                        <label>Nombre Usuario:</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="email" class="form-control" name="emailuser" placeholder="Email Usuario" value="{{ $user->email }}" required>
                        <label>Email Usuario:</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="password" class="form-control" name="passworduser" placeholder="Contraseña" value="">
                        <label>Contraseña:</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <select class="form-select" name="roluser" aria-label="" required>
                            @if(!$roles->isEmpty())
                                <option selected value="" disabled="disabled">Seleccionar un Rol</option>
                                @foreach($roles as $role)
                                    <option value="{{ \Crypt::encryptString($role->id) }}" {{ in_array($role->id, $userrol) ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            @else
                                <option value="" disabled="disabled" selected="selected">No se encontraron roles a asignar</option>
                            @endif
                        </select>
                        <label>Seleccionar Rol</label>
                    </div>
                </div>
            </div>
            <!-- <div class="card-footer text-muted">
                2 days ago
            </div> -->
        </div>
    </div>
</div>
</form>
@endsection