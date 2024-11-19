<x-layout>
    <title>Bienvenido a BokNetOF</title>

    <div class="container">
        <!-- Banner Principal -->
        <section class="py-5 text-center bg-light rounded shadow-sm">
            <div>
                <img src="{{ asset('assets/img/logo-biblioteca.png') }}" alt="Logo BokNetOF" class="mb-4" style="max-width: 100px;">
                <h1 class="display-5 fw-bold">Bienvenido a BokNetOF</h1>
                <p class="lead text-muted">Tu biblioteca digital favorita</p>
            </div>
        </section>

        <!-- Sección de Introducción -->
        <section class="my-5">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="fw-bold">Explora, Reserva y Aprende</h2>
                    <p class="text-muted">
                        Descubre un mundo de conocimiento al alcance de un clic. BokNetOF te permite buscar libros, realizar reservas y explorar géneros que te encantarán. ¡Todo en un solo lugar!
                    </p>
                    <div class="d-flex">
                        <a href="/libro" class="btn btn-primary me-3">
                            <i class="fas fa-book"></i> Ver Libros
                        </a>
                        <a href="/reserva" class="btn btn-success">
                            <i class="fas fa-calendar-check"></i> Reservar Libros
                        </a>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <img src="{{ asset('assets/img/hero-books.png') }}" alt="Libros" class="img-fluid rounded shadow">
                </div>
            </div>
        </section>

        <!-- Libros Destacados -->
        <section class="py-5">
            <h2 class="text-center mb-4 fw-bold">Libros Destacados</h2>
            <div class="row">
                <!-- Tarjeta de Libro -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm h-100">
                        <img src="{{ asset('assets/img/libro1.jpg') }}" alt="Libro 1" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">El Principito</h5>
                            <p class="card-text text-muted">Un clásico atemporal que nos invita a redescubrir la esencia de la vida.</p>
                            <a href="/libro/1" class="btn btn-outline-primary btn-sm w-100">
                                <i class="fas fa-eye"></i> Ver Detalles
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm h-100">
                        <img src="{{ asset('assets/img/libro2.jpg') }}" alt="Libro 2" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Cien Años de Soledad</h5>
                            <p class="card-text text-muted">Una obra maestra de Gabriel García Márquez sobre la vida y el destino.</p>
                            <a href="/libro/2" class="btn btn-outline-primary btn-sm w-100">
                                <i class="fas fa-eye"></i> Ver Detalles
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm h-100">
                        <img src="{{ asset('assets/img/libro3.jpg') }}" alt="Libro 3" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">1984</h5>
                            <p class="card-text text-muted">Una poderosa distopía de George Orwell que sigue siendo relevante hoy.</p>
                            <a href="/libro/3" class="btn btn-outline-primary btn-sm w-100">
                                <i class="fas fa-eye"></i> Ver Detalles
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layout>
