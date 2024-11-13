<x-layout>
    <p>
        <a href="{{ route('autor.create') }}">Registrar Autor</a>
    </p>
    <div class="card-body">
        <div class="card-sub">
            Lista de autores en la base de datos:
        </div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Nacionalidad</th>
                    <th scope="col">Creado</th>
                    <th scope="col">Modificación</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($autores as $autor)
                <tr>
                    <td>{{ $autor->id }}</td>
                    <td>
                        <a href="{{ route('autor.show', $autor) }}">
                            {{ $autor->name }}
                        </a>
                    </td>
                    <td>{{ $autor->apellido }}</td>
                    <td>{{ $autor->nacionalidad }}</td>
                    <td>{{ $autor->created_at }}</td>
                    <td>{{ $autor->updated_at }}</td>
                    <td>
                    @can('viewAdminDashboard', Auth::user())
                    <form action="{{ route ('autor.destroy', $autor) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('autor.edit', $autor) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</x-layout>