@extends('admin.index')

@section('admincontent')
<form action="{{ route('role.update',\Crypt::encryptString($role->id)) }}" method="POST">
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
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputValue" placeholder="Nombre Rol" value="{{ $role->name }}" name="rolename" required>
                    <label for="floatingInputValue">Nombre Rol</label>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @if(!$permissions->isEmpty())
                        @foreach($permissions as $permission)
                            <li class="list-group-item">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ \Crypt::encryptString($permission->id) }}" {{ in_array($permission->id, $rolepermissions) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexSwitchCheckDefault">{{ $permission->name }}</label>
                                </div>
                            </li>
                        @endforeach
                    @else
                    <li>Permisos no fueron encontrados</li>
                    @endif
                </ul>
            </div>
            <!-- <div class="card-footer text-muted">
                2 days ago
            </div> -->
        </div>
    </div>
</div>
</form>
@endsection