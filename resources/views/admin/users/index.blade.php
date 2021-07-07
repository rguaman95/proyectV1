@extends('admin.index')

@section('admincontent')
<div class="col-md-6 offset-md-3">
    <div class="mt-5">
        <div class="mb-2 text-right">
            <a href="{{ route('useradmin.create') }}" class="btn btn-primary btn-sm">Nuevo Usuario</a>
        </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">Permiso</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @if(!$users->isEmpty())
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('useradmin.show',\Crypt::encryptString($user->id)) }}" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('useradmin.edit',\Crypt::encryptString($user->id)) }}" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                            <a href="{{ route('useradmin.destroy',\Crypt::encryptString($user->id)) }}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    </div>
</div>
@endsection