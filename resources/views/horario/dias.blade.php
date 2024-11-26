<x-layout title="Horarios de Consulta">
    <section class="site-section container p-4 bg-light rounded shadow">
        <h1 class="text-center font-weight-bold text-primary">Horarios de Consulta</h1>
        <div class="mt-4">
        @if(App\Models\Horario::where('user_id', auth()->id())->exists())
            <table class="table table-bordered table-striped">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Días</th>
                        <th>Hora Inicio</th>
                        <th>Hora Fin</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>
                                @php
                                    $dias = [];
                                    foreach (['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'] as $dia) {
                                        if ($horario->$dia) {
                                            $dias[] = ucfirst($dia);
                                        }
                                    }
                                @endphp
                                {{ implode(', ', $dias) }}
                            </td>
                            <td>{{ \Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') }}</td>
                            <td>{{ \Carbon\Carbon::parse($horario->hora_fin)->format('H:i') }}</td>
                            <td>
                                <a href="{{ route('horario.edit', $horario) }}" class="btn btn-sm btn-warning">Editar</a>
                            </td>
                        </tr>
                        @endif
                        @if(!App\Models\Horario::where('user_id', auth()->id())->exists())
                        <tr>
                            <td colspan="4" class="text-center">No tienes horarios registrados.</td>
                        </tr>
                        @endif
                </tbody>
            </table>
        </div>
        @if(!App\Models\Horario::where('user_id', auth()->id())->exists())
        <div class="text-center mt-3">
            <a href="{{ route('horario.create') }}" class="btn btn-primary px-4 py-2">Agregar Nuevo Horario</a>
        </div>
        @endif
    </section>
</x-layout>
