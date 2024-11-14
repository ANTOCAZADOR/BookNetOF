<x-layout>
    <h1>Lista de reservas</h1>
    <p>
        <a href="{{ route('reserva.create') }}">Hacer reserva</a>
    </p>
    <div class="card-body">
    <div class="card-sub">
        Lista de reservas en la base de datos:
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Fecha de reserva</th>
                <th scope="col">Fecha de devolucion</th>
                <th scope="col">Estatus</th>
                <th scope="col">Creado</th>
                <th scope="col">Modificado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($reservarLibros as $reservarLibro)
            <tr>
                <td>
                    <a href="{{ route('reserva.show', $reservarLibro->id)}}">
                    {{ $reservarLibro->id}}
                    </a>
                </td> 
                <td>{{ $reservarLibro->fechaReserva }}</td>
                <td>{{ $reservarLibro->fechaDevolucionR }}</td>
                <td>{{ $reservarLibro->estatus }}</td>
                <td>{{ $reservarLibro->created_at }}</td>
                <td>{{ $reservarLibro->updated_at }}</td>
                <td>
                    @can('viewAdminDashboard', Auth::user())
                    <form action="{{ route ('reserva.destroy', $reservarLibro->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('reserva.edit', $reservarLibro->id) }}">Editar</a>
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