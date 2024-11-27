<x-layout>
    <title>Crear Libro</title>

    <div class="container py-5">
        <!-- Encabezado -->
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Crear Nuevo Libro</h1>
            <p class="text-muted fs-5">Llena los detalles del libro para agregarlo al sistema.</p>
        </div>

        @can('viewAdminDashboard', Auth::user())
        <!-- Formulario -->
        <div class="row justify-content-center">
            <!--<div class="col-lg-8 col-md-10">-->
                <div class="card shadow-lg border-0">
                    <div class="card-body p-4">
                        <form action="{{ route('libro.store') }}" method="POST" class="needs-validation" novalidate> <!--Le añadí esto a la validación lo de -> class="needs-validation" novalidate -->
                            @csrf

                            <!-- Campo Título -->
                            <div class="mb-4">
                                <label for="titulo" class="form-label fs-4 fw-bold">Título</label>
                                <input 
                                    type="text" 
                                    name="titulo" 
                                    class="form-control form-control-lg" 
                                    value="{{ old('titulo') }}" 
                                    placeholder="Ingresa el título del libro"
                                    required> <!--Le añadí esto a la validación lo de required-->
                                <div class="valid-feedback"> <!--Le añadí esto a la validación-->
                                    campo validado
                                </div>
                                <div class="invalid-feedback">
                                    Campo título obligatorio
                                </div>
                            </div>

                            <!-- Campo Autor -->
                            <div class="mb-4">
                                <label for="autor" class="form-label fs-4 fw-bold">Autor</label>
                                <input 
                                    type="text" 
                                    name="autor" 
                                    class="form-control form-control-lg" 
                                    value="{{ old('autor') }}" 
                                    placeholder="Ingresa el nombre del autor"
                                    required>
                                <div class="valid-feedback"> <!--Le añadí esto a la validación-->
                                    campo validado
                                </div>
                                <div class="invalid-feedback">
                                    Campo autor obligatorio
                                </div>
                            </div>

                            <!-- Campo Estatus -->
                            <div class="mb-4">
                                <label for="estatus" class="form-label fs-4 fw-bold">Estatus</label>
                                <select id="estatus" name="estatus" class="form-select form-select-lg needs-validation" required>
                                    <option value="" disabled {{ old('estatus') == '' ? 'selected' : '' }}>Seleccione un estatus</option>
                                    <option value="disponible" {{ old('estatus') == 'disponible' ? 'selected' : '' }}>Disponible</option>
                                    <option value="noDisponible" {{ old('estatus') == 'noDisponible' ? 'selected' : '' }}>No Disponible</option>
                                </select>
                                <div class="invalid-feedback">Este campo es obligatorio.</div>
                            </div>

                            <!-- Campo ISBN -->
                            <div class="mb-4">
                                <label for="ISBN" class="form-label fs-4 fw-bold">ISBN</label>
                                <input 
                                    type="text" 
                                    name="ISBN" 
                                    class="form-control form-control-lg" 
                                    value="{{ old('ISBN') }}" 
                                    placeholder="Ingresa el número ISBN del libro"
                                    required>
                                <div class="valid-feedback"> <!--Le añadí esto a la validación-->
                                    campo validado
                                </div>
                                <div class="invalid-feedback">
                                    Campo ISBN obligatorio
                                </div>
                            </div>

                            <!-- Campo Editorial -->
                            <div class="mb-4">
                                <label for="editorial" class="form-label fs-4 fw-bold">Editorial</label>
                                <input 
                                    type="text" 
                                    name="editorial" 
                                    class="form-control form-control-lg" 
                                    value="{{ old('editorial') }}" 
                                    placeholder="Ingresa la editorial del libro"
                                    required>
                                <div class="valid-feedback"> <!--Le añadí esto a la validación-->
                                    campo validado
                                </div>
                                <div class="invalid-feedback">
                                    Campo editorial obligatorio
                                </div>
                            </div>

                            <!-- Campo Fecha de Publicación -->
                            <div class="mb-4">
                                <label for="fechaPublicacion" class="form-label fs-4 fw-bold">Fecha de Publicación</label>
                                <input 
                                    type="date" 
                                    name="fechaPublicacion" 
                                    id="fechaPublicacion" 
                                    class="form-control form-control-lg" 
                                    value="{{ old('fechaPublicacion') }}"
                                    required>
                                <div class="valid-feedback"> <!--Le añadí esto a la validación-->
                                    campo validado
                                </div>
                                <div class="invalid-feedback">
                                    Campo date obligatorio
                                </div>
                            </div>

                            <!-- Campo Géneros -->
                            <div class="mb-4">
                                <label for="generos" class="form-label fs-4 fw-bold">Géneros</label>
                                <select id="generos" name="generos[]" class="form-control form-control-lg" multiple>
                                    @foreach($generos as $genero)
                                        <option value="{{ $genero->id }}" {{ in_array($genero->id, old('generos', [])) ? 'selected' : '' }}>
                                            {{ $genero->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="text-muted">Selecciona uno o más géneros para este libro.</small>
                            </div>

                            <!-- Botones -->
                            <div class="d-flex justify-content-between mt-4">
                                <a href="/libro" class="btn btn-secondary btn-lg px-4">
                                    <i class="fas fa-arrow-left"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-primary btn-lg px-4">
                                    <i class="fas fa-save"></i> Guardar Libro
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @else
        <!-- Acceso denegado -->
        <div class="text-center mt-5">
            <div class="alert alert-danger fs-4">
                Acceso denegado.
            </div>
            <a href="/user" class="btn btn-secondary btn-lg">Regresar</a>
        </div>
        @endcan
    </div>
    
</x-layout>
