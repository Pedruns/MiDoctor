<x-layout title="Editar Cita">
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
                    <form action="{{ route('cita.update', $cita->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="medico_id" value="{{ $cita->medico_id }}">
                        <div class="form-group mt-4">
                            <label for="fecha" class="font-weight-bold">Elige el dia que necesitas la cita</label>
                            <input type="date" class="form-control border-primary" name="fecha" id="fecha" value="{{ old('fecha') ?? $cita->fecha }}" required="">
                        </div>
                        <div class="form-group mt-4">
                            <label for="hora" class="font-weight-bold">Elige una hora disponible</label>
                            <select class="form-control border-primary" name="hora" id="hora" required=""></select>
                        </div>
                        <div class="form-group mt-4">
                            <label for="tipo" class="font-weight-bold">Tipo de cita</label>
                            <select class="form-control border-primary" id="tipo" name="tipo" required="">
                                <option value="" disabled {{ old('tipo') ? '' : ($cita->tipo ? '' : 'selected') }}>Selecciona el tipo de cita</option>
                                <option value="Presencial" {{ old('tipo') == 'Presencial' || $cita->tipo == 'Presencial' ? 'selected' : '' }}>Presencial</option>
                                <option value="En linea" {{ old('tipo') == 'En linea' || $cita->tipo == 'En linea' ? 'selected' : '' }}>En línea</option>
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <label for="notas" class="font-weight-bold">Agrega alguna nota</label>
                            <textarea name="notas" id="notas" cols="30" rows="4" class="form-control border-primary" required="" style="resize: none; overflow-y: auto;">{{ old('descripcion') ?? $cita->notas }}</textarea>
                        </div>
                        <div class="text-center mt-4">
                            <input type="submit" value="Editar cita" class="btn btn-primary btn-md px-5 py-2">
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
    const horaOriginal = "{{ \Illuminate\Support\Str::substr($cita->hora, 0, 5) }}"; 

    const today = new Date();
    const yyyy = today.getFullYear();
    const mm = String(today.getMonth() + 1).padStart(2, '0');
    const dd = String(today.getDate()).padStart(2, '0');
    fechaInput.min = `${yyyy}-${mm}-${dd}`;

    const generarHoras = () => {
        horaSelect.innerHTML = '';
        const horaInicio = 8;
        const horaFin = 20;

        for (let hora = horaInicio; hora <= horaFin; hora++) {
            const opcion1 = document.createElement('option');
            opcion1.value = `${hora.toString().padStart(2, '0')}:00`;
            opcion1.textContent = `${hora.toString().padStart(2, '0')}:00`;
            if (opcion1.value === horaOriginal) {
                opcion1.selected = true;
            }
            horaSelect.appendChild(opcion1);

            if (hora !== horaFin) {
                const opcion2 = document.createElement('option');
                opcion2.value = `${hora.toString().padStart(2, '0')}:30`;
                opcion2.textContent = `${hora.toString().padStart(2, '0')}:30`;
                if (opcion2.value === horaOriginal) {
                    opcion2.selected = true;
                }
                horaSelect.appendChild(opcion2);
            }
        }
    };

    generarHoras();
});

</script>