@extends('admin.index')

@section('admincontent')
<div class="col-md-6">
    <div class="mt-5">
        <div class="card">
            <div class="card-header">
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInputValue" placeholder="Nombre Permiso" value="{{ $permission->name }}" disabled>
                    <label for="floatingInputValue">Nombre Permiso:</label>
                </div>
            </div>
            <!-- <div class="card-footer text-muted">
                2 days ago
            </div> -->
        </div>
    </div>
</div>
@endsection