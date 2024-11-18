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
                <th scope="col">Usuario</th>
                <th scope="col">Libro</th>
                <th scope="col">Fecha de Préstamo</th>
                <th scope="col">Fecha de Devolución</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prestamos as $prestamo)
                <tr>
                    <td>{{ $prestamo->id }}</td>
                    <td>{{ $prestamo->user->name ?? 'Sin usuario' }}</td>
                    <td>{{ $prestamo->libro->titulo ?? 'Sin libro' }}</td>
                    <td>{{ $prestamo->fechaPrestamo }}</td>
                    <td>{{ $prestamo->fechaDevolucionP }}</td>
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