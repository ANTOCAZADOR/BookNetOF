<x-layout>
    <body>
        <title>Crear reserva</title>
        @can('viewAdminDashboard', Auth::user())
            <h1>Crear reserva</h1>
            <form action="{{ route('reserva.store') }}" method="POST">
                @csrf

                <div>
                    <label for="fechaReserva">Fecha de reserva:</label><br>
                    <input type="date" name="fechaReserva" id="fechaReserva" value="{{ old('fechaReserva') }}">
                </div>
                <br>

                <div>
                    <label for="fechaDevolucionR">Fecha de devolución:</label><br>
                    <input type="date" name="fechaDevolucionR" id="fechaDevolucionR" value="{{ old('fechaDevolucionR') }}">
                </div>
                <br>

                <div>
                    <label for="estatus">Estatus:</label><br>
                    <select id="estatus" name="estatus">
                        <option value="disponible">disponible</option>
                        <option value="noDisponible">noDisponible</option>
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
