@extends('admin.index')

@section('admincontent')
<div class="col-md-6">
    <div class="mt-5">
        <div class="card">
            <div class="card-header">
                <h6>Usuario {{ $user->name }}</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" placeholder="Nombre Usuario" value="{{ $user->name }}" disabled>
                        <label>Nombre Usuario:</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="email" class="form-control" placeholder="Email Usuario" value="{{ $user->email }}" disabled>
                        <label>Email Usuario:</label>
                    </div>
                </div>
            </div>
            <!-- <div class="card-footer text-muted">
                2 days ago
            </div> -->
        </div>
    </div>
</div>
@endsection