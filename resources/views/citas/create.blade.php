<x-layout title="Nueva Cita">
    <!-- Contact Section -->
    <section id="contact" class="site-section container p-4 bg-light rounded shadow">
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
                    <form action="{{ route('cita.store') }}" method="POST">
                        @csrf
                        <div class="form-group mt-4">
                            <label for="fecha" class="font-weight-bold">Elige el dia que necesitas la cita</label>
                            <input type="date" class="form-control border-primary" name="fecha" id="fecha" value="{{ old('fecha') }}" required="">
                        </div>
                        <div class="form-group mt-4">
                            <label for="hora" class="font-weight-bold">Elige una hora disponible</label>
                            <select class="form-control border-primary" name="hora" id="hora" value="{{ old('hora') }}" required=""></select>
                        </div>
                        <div class="form-group mt-4">
                            <label for="tipo" class="font-weight-bold">Tipo de cita</label>
                            <select class="form-control border-primary" id="tipo" name="tipo" required="">
                                <option value="" disabled {{ old('tipo') ? '' : 'selected' }}>Selecciona el tipo de cita</option>
                                <option value="Presencial" {{ old('tipo') == 'Presencial' ? 'selected' : '' }}>Presencial</option>
                                <option value="En linea" {{ old('tipo') == 'En linea' ? 'selected' : '' }}>En línea</option>
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <label for="notas" class="font-weight-bold">Agrega alguna nota</label>
                            <textarea name="notas" id="notas" cols="30" rows="4" class="form-control border-primary" required="" style="resize: none; overflow-y: auto;">{{ old('descripcion') }}</textarea>
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
        const fechaInput = document.getElementById('fecha');
        const horaSelect = document.getElementById('hora');

        // Configurar la fecha mínima como hoy
        const today = new Date();
        const yyyy = today.getFullYear();
        const mm = String(today.getMonth() + 1).padStart(2, '0');
        const dd = String(today.getDate()).padStart(2, '0');
        fechaInput.min = `${yyyy}-${mm}-${dd}`;

        // Generar opciones de horas disponibles
        const generarHoras = () => {
            // Limpiar opciones existentes
            horaSelect.innerHTML = '';

            // Definir rango de horas (08:00 a 20:00)
            const horaInicio = 8;
            const horaFin = 20;

            for (let hora = horaInicio; hora <= horaFin; hora++) {
                // Añadir opciones de 00 minutos
                const opcion1 = document.createElement('option');
                opcion1.value = `${hora.toString().padStart(2, '0')}:00`;
                opcion1.textContent = `${hora.toString().padStart(2, '0')}:00`;
                horaSelect.appendChild(opcion1);

                // Añadir opciones de 30 minutos
                if (hora !== horaFin) { // Evitar 20:30 como opción
                    const opcion2 = document.createElement('option');
                    opcion2.value = `${hora.toString().padStart(2, '0')}:30`;
                    opcion2.textContent = `${hora.toString().padStart(2, '0')}:30`;
                    horaSelect.appendChild(opcion2);
                }
            }
        };

        // Generar las opciones de horas al cargar la página
        generarHoras();
    });
</script>