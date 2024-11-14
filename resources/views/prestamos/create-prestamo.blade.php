<x-layout>
    <body>
    <title>Crear prestamo</title>
        @can('viewAdminDashboard', Auth::user())
        <h1>Create Prestamo</h1>
        <form action="{{ route('prestamo.store') }}"method="POST">
            @csrf

                <label for="fechaPrestamo">Fecha Prestamo:</label><br>
                <input type="date" name="fechaPrestamo" id="fechaPrestamo" value="{{ old('fechaPrestamo') }}">

                <br><label for="fechaDevolucionP">Fecha Devolucion:</label><br>
                <input type="date" name="fechaDevolucionP" id="fechaDevolucionP" value="{{ old('fechaDevolucionP') }}">

                <br><button type="submit" class="btn btn-primary">Send</button>
        @else
            <p>Acceso denegado</p>
            <a href="/prestamo" class="btn btn-primary">Aceptar</a>
        @endcan
    </body>
</x-layout>