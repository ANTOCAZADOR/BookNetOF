<x-layout>
    <h1>Lista de libros</h1>
    <p>
        <a href="{{ route('libro.create') }}">Registar Libros</a>
    </p>
    <div class="card-body">
    <div class="card-sub">
        Lista de libros en la base de datos:
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titulo</th>
                <th scope="col">Autor</th>
                <th scope="col">Estatus</th>
                <th scope="col">ISBN</th>
                <th scope="col">Editorial</th>
                <th scope="col">Fecha de publicación</th>
                <th scope="col">Generos</th>
                <th scope="col">Creado</th>
                <th scope="col">Modificado</th>
                <th scope="col">Acciones</th>
                <th scope="col">Reservar</th>
            </tr>
        </thead>
        <tbody>
        @foreach($libros as $libro)
            <tr>
                <td>{{ $libro->id}}</td> 
                <td>
                    <a href="{{ route('libro.show', $libro) }}">
                        {{ $libro->titulo }}
                    </a>
                </td>
                <td>{{ $libro->autor }}</td>
                <td>{{ $libro->estatus }}</td>
                <td>{{ $libro->ISBN }}</td>
                <td>{{ $libro->editorial }}</td>
                <td>{{ $libro->fechaPublicacion }}</td>
                <td>
                    @foreach ($libro->generos as $genero)
                        <li>{{ $genero->name }}</li>
                    @endforeach
                </td>
                <td>{{ $libro->created_at }}</td>
                <td>{{ $libro->updated_at }}</td>
                <td>
                    @can('viewAdminDashboard', Auth::user())
                    <form action="{{ route ('libro.destroy', $libro) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('libro.edit', $libro) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                    @endcan
                </td>
                <td>
                    @if($libro->estatus === 'disponible')
                        <form action="{{ route('reserva.store') }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            <input type="hidden" name="libro_id" value="{{ $libro->id }}">
                            <button type="submit" class="btn btn-warning">Reservar</button>
                        </form>
                    @else
                        <span class="text-muted">No disponible</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</x-layout>