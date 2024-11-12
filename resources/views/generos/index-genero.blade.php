<x-layout>
    <p>
        <a href="{{ route('genero.create') }}">Registrar Genero</a>
    </p>
    <div class="card-body">
        <div class="card-sub">
            Lista de generos en la base de datos:
        </div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Modificación</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($generos as $genero)
                <tr>
                    <td>{{ $genero->id }}</td>
                    <td>
                        <a href="{{ route('genero.show', $genero) }}">
                            {{ $genero->name }}
                        </a>
                    </td>
                    <td>{{ $genero->created_at }}</td>
                    <td>{{ $genero->updated_at }}</td>
                    <td>
                    @can('viewAdminDashboard', Auth::user())
                    <form action="{{ route ('genero.destroy', $genero) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('genero.edit', $genero) }}">Editar</a>
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