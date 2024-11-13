<x-layout>
    @can('viewAdminDashboard', Auth::user())
    <h1>Create Autor</h1>
    <form action="{{ route('autor.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" tabindex="1" value="{{ old('name') }}">
        </div>

        <div class="card-body">
            <label for="apellido" class="form-label">Apellido:</label>
            <input type="text" name="apellido" class="form-control" tabindex="1" value="{{ old('apellido') }}">
        </div>

        <div class="card-body">
            <label for="nacionalidad" class="form-label">Nacionalidad:</label>
            <input type="text" name="nacionalidad" class="form-control" tabindex="1" value="{{ old('nacionalidad') }}">
        </div>


       <button type="submit" class="btn btn-primary">Send</button>
    </form>
    @else
        <p>Acceso denegado</p>
        <a href="{{ route('autor.index') }}" class="btn btn-primary">Aceptar</a>
    @endcan
</x-layout>