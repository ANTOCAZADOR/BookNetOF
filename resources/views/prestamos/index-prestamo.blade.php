<x-layout>
    <h1>Lista de prestamos</h1>
    <p>
        <a href="{{ route('prestamo.create') }}">Registar Prestamos</a>
    </p>
    <div class="card-body">
    <div class="card-sub">
        Lista de prestamos en la base de datos:
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Fecha del prestamo</th>
                <th scope="col">Fecha de devolución</th>
                <th scope="col">Creado</th>
                <th scope="col">Modificado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($prestamos as $prestamo)
            <tr>
                <td>
                    <a href="{{ route('prestamo.show', $prestamo) }}">
                    {{ $prestamo->id}}
                    </a>
                </td> 
                <td>{{ $prestamo->fechaPrestamo }}</td>
                <td>{{ $prestamo->fechaDevolucionP }}</td>
                <td>{{ $prestamo->created_at }}</td>
                <td>{{ $prestamo->updated_at }}</td>
                <td>
                    @can('viewAdminDashboard', Auth::user())
                    <form action="{{ route ('prestamo.destroy', $prestamo) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('prestamo.edit', $prestamo) }}">Editar</a>
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