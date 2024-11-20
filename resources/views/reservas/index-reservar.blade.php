<x-layout>
    <h1>Lista de reservas</h1>
    <p>
        @if(auth()->user()->rol === 'administrator')
            <a href="{{ route('reserva.create') }}">Hacer reserva</a>
        @endif
    </p>
    <div class="card-body">
        <div class="card-sub">
            Lista de reservas en la base de datos:
        </div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Libro</th>
                    <th scope="col">Fecha de reserva</th>
                    <th scope="col">Fecha de devolución</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Creado</th>
                    <th scope="col">Modificado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservarLibros as $reservarLibro)
                    {{-- Mostrar todas las reservas si es administrador, o solo las propias si es usuario --}}
                    @if(auth()->user()->rol === 'administrator' || $reservarLibro->user_id === auth()->id())
                        <tr>
                            <td>{{ $reservarLibro->libro->id }}</td>
                            <td>{{ $reservarLibro->user->name ?? 'Sin usuario' }}</td>
                            <td>{{ $reservarLibro->libro->titulo ?? 'Sin libro' }}</td>
                            <td>{{ $reservarLibro->fechaReserva }}</td>
                            <td>{{ $reservarLibro->fechaDevolucionR }}</td>
                            <td>{{ $reservarLibro->libro->estatus }}</td>
                            <td>{{ $reservarLibro->created_at }}</td>
                            <td>{{ $reservarLibro->updated_at }}</td>
                            <td>
                                @if(auth()->user()->rol === 'administrator')
                                    {{-- Solo el administrador puede editar o eliminar reservas --}}
                                    <form action="{{ route('reserva.destroy', $reservarLibro->id) }}" method="POST">
                                        <a class="btn btn-info" href="{{ route('reserva.edit', $reservarLibro->id) }}">Editar</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                    </form>
                                @else
                                    {{-- Si es un usuario normal, solo puede ver los detalles de su reserva --}}
                                    <a class="btn btn-secondary" href="{{ route('reserva.show', $reservarLibro->id) }}">Ver</a>
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
