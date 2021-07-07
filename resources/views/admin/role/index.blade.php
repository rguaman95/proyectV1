@extends('admin.index')

@section('admincontent')
<div class="col-md-6 offset-md-3">
    <div class="mt-5">
        <!-- <h5>ROLES</h5>
        <ul class="list-group">
            @foreach ($roles as $role)
                <li class="list-group-item">{{ $role->name }}</li>
            @endforeach
        </ul> -->
        <div class="mb-2 text-right">
            <a href="{{ route('role.create') }}" class="btn btn-primary btn-sm">Nuevo Rol</a>
        </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">Rol</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(!$roles->isEmpty())
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('role.show',\Crypt::encryptString($role->id)) }}" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('role.edit',\Crypt::encryptString($role->id)) }}" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                            <a href="{{ route('role.destroy',\Crypt::encryptString($role->id)) }}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    </div>
</div>
@endsection