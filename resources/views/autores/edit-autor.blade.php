<x-layout>
    <title>Editar Autor</title>
    <body>
        @can('viewAdminDashboard', Auth::user())
        <h1>Edit genero</h1>
        <form action="{{ route('autor.update', $autor) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="card-body">
            <label for="name" class="form-label">Name:</label><br>
            <input type="text" name="name" class="form-control" tabindex="1" value="{{ old('name') ?? $autor->name }}"><br>
            </div>

            <div class="card-body">
            <label for="apellido" class="form-label">Apellido:</label><br>
            <input type="text" name="apellido" class="form-control" tabindex="1" value="{{ old('apellido') ?? $autor->apellido }}"><br>
            </div>

            <div class="card-body">
            <label for="nacionalidad" class="form-label">Nacionalidad:</label><br>
            <input type="text" name="nacionalidad" class="form-control" tabindex="1" value="{{ old('nacionalidad') ?? $autor->nacionalidad }}"><br>
            </div>

            <button type="submit" class="btn btn-primary">Send</button>
        </form>
        @else
            <p>Access denied.</p>
        @endcan
    </body>
</x-layout>