<x-layout>
<title>Detalles de reserva</title>
</head>
<body>
    <h1>{{ $reservarLibro->id }}</h1>
    <form action="{{ route('reserva.show', $reservarLibro) }}"method="POST">
    <ul>
        <li>{{ $reservarLibro->fechaReserva }}</li>
        <li>{{ $reservarLibro->fechaDevolucionR }}</li>
        <li>{{ $reservarLibro->estatus }}</li>
        <li>{{ $reservarLibro->created_at }}</li>
        <li>{{ $reservarLibro->updated_at }}</li>
    </ul>

    <a href="{{ route('reserva.edit', $reservarLibro) }}">Editar</a><br>

    <form action="{{ route('reserva.destroy', $reservarLibro) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Borrar">
    </form>
</body>
</x-layout>