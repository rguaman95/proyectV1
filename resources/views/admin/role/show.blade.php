@extends('admin.index')

@section('admincontent')
<div class="col-md-6">
    <div class="mt-5">
        <div class="card">
            <div class="card-header">
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInputValue" placeholder="Nombre Rol" value="{{ $role->name }}" disabled>
                    <label for="floatingInputValue">Nombre Rol:</label>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush"><?php $rolepermissions;?>
                    @if(!$permissions->isEmpty())
                        @foreach($permissions as $permission)
                            <li class="list-group-item">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" disabled {{ in_array($permission->id, $rolepermissions) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexSwitchCheckDisabled">{{ $permission->name }}</label>
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
@endsection