<x-layout title="Definir Dias">
    <section class="site-section container p-4 bg-light rounded shadow">
        <div class="container" data-aos="fade">
            <div class="row gy-5 gx-lg-5">
                <div class="col-md-8 blog-content mx-auto">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <h1 class="mb-4 text-center font-weight-bold text-primary">Crear una cita con el doctor ...</h1>
                    @if(!App\Models\Horario::where('user_id', auth()->id())->exists())
                    <form action="{{ route('horario.store') }}" method="POST">
                    @csrf
                    @else
                    <form action="{{ route('horario.update', $horario) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    @endif
                        <div class="form-group mt-4">
                            <label for="dias" class="font-weight-bold">Selecciona los días disponibles</label>
                            <select wire:model="dias" name="dias[]" id="dias" class="form-control border-primary" multiple size=7 required>
                                <option value="lunes">Lunes</option>
                                <option value="martes">Martes</option>
                                <option value="miercoles">Miércoles</option>
                                <option value="jueves">Jueves</option>
                                <option value="viernes">Viernes</option>
                                <option value="sabado">Sábado</option>
                                <option value="domingo">Domingo</option>
                            </select>
                            @error('dias') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mt-4">
                            <label for="hora_inicio" class="font-weight-bold">Elige una hora de inicio</label>
                            <select class="form-control border-primary" name="hora_inicio" id="hora_inicio" value="{{ old('hora') }}" required=""></select>
                        </div>
                        <div class="form-group mt-4">
                            <label for="hora_fin" class="font-weight-bold">Elige una hora final</label>
                            <select class="form-control border-primary" name="hora_fin" id="hora_fin" value="{{ old('hora') }}" required=""></select>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-md px-5 py-2">
                                <i class="fas fa-calendar-check"></i> Registrar cita
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section><!-- /Contact Section -->
</x-layout>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const horaInicioSelect = document.getElementById('hora_inicio');
        const horaFinSelect = document.getElementById('hora_fin');

        // Generar opciones de horas disponibles
        const generarHoras = (select) => {
            select.innerHTML = '';

            const horaInicio = 0;
            const horaFin = 24;

            for (let hora = horaInicio; hora <= horaFin; hora++) {
                const opcion1 = document.createElement('option');
                opcion1.value = `${hora.toString().padStart(2, '0')}:00`;
                opcion1.textContent = `${hora.toString().padStart(2, '0')}:00`;
                select.appendChild(opcion1);

            }
        };

        generarHoras(horaInicioSelect);
        generarHoras(horaFinSelect);
    });
</script>
