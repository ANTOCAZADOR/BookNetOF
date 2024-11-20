<x-layout>
    <h1>Lista de préstamos</h1>
    <p>
        @if(auth()->user()->rol === 'administrator')
            <a href="{{ route('prestamo.create') }}">Registrar Préstamos</a>
        @endif
    </p>
    <div class="card-body">
        <div class="card-sub">
            Lista de préstamos en la base de datos:
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
                    {{-- Mostrar todos los préstamos si es administrador, o solo los propios si es usuario --}}
                    @if(auth()->user()->rol === 'administrator' || $prestamo->user_id === auth()->id())
                        <tr>
                            <td>{{ $prestamo->libro->id }}</td>
                            <td>{{ $prestamo->user->name ?? 'Sin usuario' }}</td>
                            <td>{{ $prestamo->libro->titulo ?? 'Sin libro' }}</td>
                            <td>{{ $prestamo->fechaPrestamo }}</td>
                            <td>{{ $prestamo->fechaDevolucionP }}</td>
                            <td>
                                @if(auth()->user()->rol === 'administrator')
                                    {{-- Administrador: Editar y eliminar --}}
                                    <form action="{{ route('prestamo.destroy', $prestamo) }}" method="POST">
                                        <a class="btn btn-info" href="{{ route('prestamo.edit', $prestamo) }}">Editar</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
