<x-layout>
    <body>
    <title>Crear usuario</title>
        @can('viewAdminDashboard', Auth::user())
        <h1>Create User</h1>
        <form action="{{ route('user.store') }}"method="POST">
            @csrf
                <div class="card-body">
                <label for= "name" class="form-label">Name:</label><br>
                <input type="text" name="name" class="form-control" tabindex="1" value="{{ old('name')}}"><br>
                </div>

                <label for="rol">Selecciona tu rol:</label>
                <select id="rol" name="rol">
                    <option value="user">user</option>
                    <option value="administrator">administrator</option>
                </select>

                <div class="card-body">
                <label for= "email">Email:</label><br>
                <input type="text" name="email" class="form-control" tabindex="2" value="{{ old('email')}}">
                </div>

                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="card-body">
                <label for= "password">Password:</label><br>
                <input type="text" name="password" class="form-control" tabindex="3" value="{{ old('password')}}"><br>
                </div>

                <button type="submit" class="btn btn-primary">Send</button>
        @else
            <p>Acceso denegado</p>
            <a href="/user" class="btn btn-primary">Aceptar</a>
        @endcan
    </body>
</x-layout>