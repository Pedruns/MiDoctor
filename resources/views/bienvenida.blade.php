<x-layout title="Bienvenida">
    <section class="py-5 py-md-7 bg-light">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-4 text-primary-green">
                Tu salud en un solo lugar
            </h1>
            <p class="lead text-muted mb-5 mx-auto" style="max-width: 700px;">
                MiDoctor te permite agendar y gestionar citas médicas de forma rápida y sencilla,
                ya seas médico o paciente.
            </p>
            @if(!Auth::check())
            <div class="d-flex gap-3 justify-content-center">
                <a href="{{ route('register') }}" class="btn btn-primary btn-md px-5 py-2">
                    Registrarse
                </a>
            </div>
            @endif
        </div>
    </section>

    <section id="caracteristicas" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 text-primary-green">
                Características principales
            </h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-calendar-check mb-3 text-primary-green" style="font-size: 2rem;"></i>
                            <h3 class="h5 mb-3">Agenda fácilmente</h3>
                            <p class="text-muted mb-0">
                                Programa tus citas con unos pocos clics, sin complicaciones.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-people mb-3 text-primary-green" style="font-size: 2rem;"></i>
                            <h3 class="h5 mb-3">Para médicos y pacientes</h3>
                            <p class="text-muted mb-0">
                                Una plataforma única para profesionales de la salud y pacientes.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-search mb-3 text-primary-green" style="font-size: 2rem;"></i>
                            <h3 class="h5 mb-3">Encuentra Especialista</h3>
                            <p class="text-muted mb-0">
                                Encuentra todo tipo de especialistas en nuestra base de datos
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="como-funciona" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5 text-primary-green">
                Cómo funciona
            </h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="rounded-circle mb-3 mx-auto d-flex align-items-center justify-content-center bg-primary text-white" style="width: 60px; height: 60px;">
                            1
                        </div>
                        <h3 class="h5 mb-3">Regístrate</h3>
                        <p class="text-muted">
                            Crea tu cuenta en nuestra plataforma.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="rounded-circle mb-3 mx-auto d-flex align-items-center justify-content-center bg-primary text-white" style="width: 60px; height: 60px;">
                            2
                        </div>
                        <h3 class="h5 mb-3">Busca o configura tus citas</h3>
                        <p class="text-muted">
                            Los pacientes buscan médicos, los médicos configuran sus citas.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="rounded-circle mb-3 mx-auto d-flex align-items-center justify-content-center bg-primary text-white" style="width: 60px; height: 60px;">
                            3
                        </div>
                        <h3 class="h5 mb-3">Agenda y revisa citas</h3>
                        <p class="text-muted">
                            Programa citas, recibe confirmaciones y revisa tu agenda médica.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="mb-4 text-primary-green">
                Comienza a gestionar tus citas hoy mismo
            </h2>
            <p class="lead text-muted mb-5 mx-auto" style="max-width: 700px;">
                Únete a MiDoctor y experimenta una nueva forma de manejar tus citas médicas.
            </p>
            @if(!Auth::check())
            <a href="{{ route('register') }}" class="btn btn-primary btn-md px-5 py-2">
                Registrarse ahora
            </a>
            @endif
        </div>
    </section>
</x-layout>