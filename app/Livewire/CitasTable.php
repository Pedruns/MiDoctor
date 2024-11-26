<?php

namespace App\Livewire;

use App\Mail\ConfirmarCitaMail;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Cita;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class CitasTable extends DataTableComponent
{
    protected $model = Cita::class;

    public function builder(): Builder
    {
        return Cita::query()->where('medico_id', Auth::id());
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Fecha", "fecha")
                ->sortable()
                ->searchable(),
            Column::make("Paciente", "paciente.name")
                ->sortable()
                ->searchable(),
            Column::make("Hora", "hora")
                ->sortable()
                ->searchable(),
            Column::make("Estado", "estado")
                ->sortable()
                ->searchable(),
            Column::make("Tipo", "tipo")
                ->sortable(),
            Column::make("Notas", "notas")
                ->searchable(),
            ButtonGroupColumn::make("Acciones", "id")
                ->buttons([
                    LinkColumn::make('Confirmar')
                        ->title(fn($row) => 'Confirmar')
                        ->location(fn($row) => '#')
                        ->attributes(fn($row) => [
                            'class' => 'btn btn-success btn-sm',
                            'wire:click' => "confirmar({$row->id})",
                        ]),
                    LinkColumn::make('Cancelar')
                        ->title(fn($row) => 'Cancelar')
                        ->location(fn($row) => '#')
                        ->attributes(fn($row) => [
                            'class' => 'btn btn-danger btn-sm',
                            'wire:click' => "cancelar({$row->id})",
                        ]),
                ]),
        ];
    }

    public function confirmar($id)
    {
        $cita = Cita::find($id);
        $user = User::find($cita->paciente_id);

        if ($cita) {
            $cita->update(['estado' => 'confirmada']);
        }

        Mail::to($user->email)->send(new ConfirmarCitaMail($cita));
    }
    public function cancelar($id)
    {
        $cita = Cita::find($id);
        $user = User::find($cita->paciente_id);

        if ($cita) {
            $cita->update(['estado' => 'cancelada']);
        }

        Mail::to($user->email)->send(new ConfirmarCitaMail($cita));
    }
}
