@extends('admin.index')

@section('admincontent')
<form action="{{ route('permission.update',\Crypt::encryptString($permission->id)) }}" method="POST">
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
                    <input type="text" class="form-control" id="floatingInputValue" placeholder="Nombre Permiso" value="{{ $permission->name }}" name="permissionname" required>
                    <label for="floatingInputValue">Nombre Permiso</label>
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