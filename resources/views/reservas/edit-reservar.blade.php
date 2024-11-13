<x-layout>
    <title>Editar reserva</title>
    <body>
        @can('viewAdminDashboard', Auth::user())
        <h1>Editar reserva</h1>
        <form action="{{ route('reserva.update', $reservarLibro->id) }}" method="POST">
            @csrf
            @method('PATCH')

                <div>
                    <label for="fechaReserva">Fecha de reserva:</label><br>
                    <input type="date" name="fechaReserva" id="fechaReserva" value="{{ old('fechaReserva') ?? $reservarLibro->fechaReserva}}">
                </div>
                <br>

                <div>
                    <label for="fechaDevolucionR">Fecha de devolución:</label><br>
                    <input type="date" name="fechaDevolucionR" id="fechaDevolucionR" value="{{ old('fechaDevolucionR') ?? $reservarLibro->fechaDevolucionR}}">
                </div>
                <br>

                <div>
                    <label for="estatus">Estatus:</label><br>
                    <select id="estatus" name="estatus">
                        <option value="disponible" {{ (old('estatus') ?? $reservarLibro->estatus) == 'disponible' ? 'selected' : '' }}>disponible</option>
                        <option value="noDisponible" {{ (old('estatus') ?? $reservarLibro->estatus) == 'noDisponible' ? 'selected' : '' }}>noDisponible</option>
                    </select>
                </div>
                <br>

                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        @else
            <p>Acceso denegado</p>
            <a href="/user" class="btn btn-primary">Aceptar</a>
        @endcan
    </body>
</x-layout>
