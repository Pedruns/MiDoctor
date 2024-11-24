<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class SolicitudesTable extends DataTableComponent
{
    protected $model = Doctor::class;

    public function builder(): Builder
    {
        return Doctor::query()->where('estado', 'pendiente');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Usuario", "user.name")
                ->sortable(),
            Column::make("Especialidad", "especialidad")
                ->sortable(),
            Column::make("Cedula", "cedula")
                ->sortable(),
            Column::make("Consultorio", "consultorio")
                ->sortable(),
            Column::make("Acerca", "acerca")
                ->sortable(),
            LinkColumn::make("Identificación", "ruta_archivo")
                ->title(fn($row) => 'Descargar')
                ->location(fn($row) => asset('storage/' . $row->ruta_archivo))
                ->attributes(fn($row) => [
                    'class' => 'btn btn-primary btn-sm',
                    'target' => '_blank',
                    'download' => '',
                ]),
            ButtonGroupColumn::make("Acciones")
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
        $doctor = Doctor::find($id);
        if ($doctor) {
            $doctor->update(['estado' => 'confirmado']);
            $user = User::find($doctor->user_id);
            if ($user) {
                $user->syncRoles(['medico']);
            }
        }
    }

    public function cancelar($id)
    {
        $doctor = Doctor::find($id);

        if ($doctor) {
            $doctor->update(['estado' => 'rechazado']);
        }
    }
}
