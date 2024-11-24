<x-layout>
    @can('viewAdminDashboard', Auth::user())
    <h1>Create Genero</h1>
    <form action="{{ route('genero.store') }}" method="POST" class="needs-validation" novalidate> <!--Le añadí esto a la validación lo de -> class="needs-validation" novalidate -->
        @csrf
        <div class="card-body">
            <label for="name" class="form-label">Name:</label>
            <input 
            type="text" 
            name="name" 
            class="form-control" 
            tabindex="1" 
            value="{{ old('name') }}"
            required> <!--Le añadí esto a la validación lo de required-->
        <div class="valid-feedback"> <!--Le añadí esto a la validación-->
            campo validado
        </div>
        <div class="invalid-feedback">
            Campo nombre obligatorio
        </div>
        </div>

       <button type="submit" class="btn btn-primary">Send</button>
    </form>
    @else
        <p>Acceso denegado</p>
        <a href="{{ route('genero.index') }}" class="btn btn-primary">Aceptar</a>
    @endcan
</x-layout>