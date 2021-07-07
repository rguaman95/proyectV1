@extends('admin.index')

@section('admincontent')
<div class="col-md-6 offset-md-3">
    <div class="mt-5">
        <div class="mb-2 text-right">
            <a href="{{ route('permission.create') }}" class="btn btn-primary btn-sm">Nuevo Permiso</a>
        </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">Permiso</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @if(!$permissions->isEmpty())
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td class="text-center">
                            @can('Ver Permiso')
                            <a href="{{ route('permission.show',\Crypt::encryptString($permission->id)) }}" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></a>
                            @endcan
                            @can('Crear Permiso')
                            <a href="{{ route('permission.edit',\Crypt::encryptString($permission->id)) }}" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                            @endcan
                            @can('Eliminar Permiso')
                            <a href="{{ route('permission.destroy',\Crypt::encryptString($permission->id)) }}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    </div>
</div>
@endsection