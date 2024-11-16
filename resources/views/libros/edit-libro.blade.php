<x-layout>
    <title>Editar libro</title>
    <body>
        @can('viewAdminDashboard', Auth::user())
        <h1>Edit Libro</h1>
        <form action="{{ route('libro.update', $libro) }}" method="POST">
            @csrf
            @method('PATCH')
            
                <div class="card-body">
                    <label for= "titulo" class="form-label">Titulo:</label><br>
                    <input type="text" name="titulo" class="form-control" value="{{ old('titulo') ?? $libro->titulo}}"><br>
                </div>

                <div class="card-body">
                    <label for= "autor">Autor:</label><br>
                    <input type="text" name="autor" class="form-control" value="{{ old('autor') ?? $libro->autor}}">
                </div>

                <label for="estatus">Estatus:</label>
                <select id="estatus" name="estatus">
                    <option value="disponible" {{ (old('estatus') ?? $libro->estatus) == 'disponible' ? 'selected' : '' }}>disponible</option>
                    <option value="noDisponible" {{ (old('estatus') ?? $libro->estatus) == 'noDisponible' ? 'selected' : '' }}>noDisponible</option>
                </select>

                <div class="card-body">
                    <label for= "ISBN">ISBN:</label><br>
                    <input type="text" name="ISBN" class="form-control" value="{{ old('ISBN') ?? $libro->ISBN}}">
                </div>

                <div class="card-body">
                    <label for= "editorial">Editorial:</label><br>
                    <input type="text" name="editorial" class="form-control" value="{{ old('editorial') ?? $libro->editorial}}">
                </div>

                <label for="fechaPublicacion">Fecha:</label><br>
                <input type="date" name="fechaPublicacion" id="fechaPublicacion" value="{{ old('fechaPublicacion') ?? $libro->fechaPublicacion}}">

                <div class="card-body">
                    <label for="generos">Géneros:</label><br>
                    <select id="generos" name="generos[]" class="form-control" multiple>
                        @foreach($generos as $genero)
                            <option value="{{ $genero->id }}" 
                                {{ in_array($genero->id, $libro->generos->pluck('id')->toArray()) ? 'selected' : '' }}>
                                {{ $genero->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Send</button>
        @else
            <p>Acceso denegado</p>
            <a href="/user" class="btn btn-primary">Aceptar</a>
        @endcan
    </body>
</x-layout>