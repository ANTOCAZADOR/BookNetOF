<x-layout>
    <h1>Lista de Usuarios</h1>
    <p>
        <a href="{{ route('user.create') }}">Registrar Usuario</a>
    </p>
    <div class="card-body">
    <div class="card-sub">
        Lista de usuairos en la base de datos:
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Rol</th>
                <th scope="col">Password</th>
                <th scope="col">Creado</th>
                <th scope="col">Modificación</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td> 
                <td>
                    <a href="{{ route('user.show', $user) }}">
                        {{ $user->name }}
                    </a>
                </td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->rol }}</td>
                <td>{{ $user->password }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
                <td>
                    @can('viewAdminDashboard', Auth::user())
                    <form action="{{ route ('user.destroy', $user) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('user.edit', $user) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-layout>