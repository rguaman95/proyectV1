@extends('admin.index')

@section('admincontent')
<form action="{{ route('permission.store') }}" method="POST">
@csrf

<div class="col-md-6">
    <div class="mt-5">
        <div class="mb-2 text-right">
            <button type="reset" class="btn btn-warning">Resetear</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="form-floating">
                    <input type="text" class="form-control" placeholder="Nombre Permiso" value="" name="permissionname" required>
                    <label>Nombre Permiso</label>
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