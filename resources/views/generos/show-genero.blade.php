<x-layout>
<title>Detalles de Genero</title>
</head>
<body>
    <h1>{{ $genero->name }}</h1>
    <form action="{{ route('genero.show', $genero) }}"method="POST">
    <ul>
        <li>{{ $genero->created_at }}</li>
        <li>{{ $genero->updated_at }}</li>
    </ul>

    <a href="{{ route('genero.edit', $genero) }}">Editar</a><br>

    <form action="{{ route('genero.destroy', $genero) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Borrar">
    </form>
</body>
</x-layout>