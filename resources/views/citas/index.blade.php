<x-layout title="Mis citas">
    <section id="contact" class="site-section container p-4 bg-light rounded shadow">
        <div class="container" data-aos="fade">
            <div class="row gy-5 gx-lg-5">
                <div class="col-md-8 blog-content mx-auto">
                    <h1 class="mb-4 text-center font-weight-bold text-primary">Mis citas</h1>
                    @foreach($citas as $cita)
                    <div class="card mb-3 shadow-sm border-success">
                        <div class="card-header bg-success1 text-white">
                            <h5 class="card-title mb-0">Cita: {{ $cita->tipo }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <strong>Medico:</strong> {{ $cita->medico->name}}<br>
                                <strong>Fecha:</strong> {{ $cita->fecha }}<br>
                                <strong>Hora:</strong> {{ $cita->hora }}<br>
                                <strong>Estado:</strong> <span class="badge bg-primary">{{ $cita->estado }}</span><br>
                                <strong>Notas:</strong> {{ $cita->notas ?: 'Sin notas adicionales' }}
                            </p>
                        </div>
                        <div class="card-footer d-flex justify-content-start align-items-center gap-2">
                            <a href="#" class="btn btn-outline-primary btn-sm">Editar</a>
                            <form action="#" method="POST" class="mb-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Cancelar</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-layout>