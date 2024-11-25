<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LivewireComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ViewComponentColumn;

class MedicosTable extends DataTableComponent
{
    protected $model = User::class;

    public function builder(): Builder
    {
        return User::query()->whereHas('roles', function ($query) {
            $query->where('name', 'medico');
        });
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Nombre", "name")
                ->sortable()
                ->searchable(),
            Column::make("Especialidad", "doctor.especialidad")
                ->sortable()
                ->searchable(),
            Column::make("Email", "email"),
            Column::make("Numero", "number"),
            Column::make("Consultorio", "doctor.consultorio")
                ->sortable()
                ->searchable(),
            Column::make("Informacion", "doctor.acerca")
                ->searchable(),
            ButtonGroupColumn::make("Actions", "id")
                ->attributes(function ($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('View') // make() has no effect in this case but needs to be set anyway
                        ->title(fn($row) => 'Agendar Cita')
                        ->location(fn($row) => route('cita.crear', $row))
                        ->attributes(function ($row) {
                            return [
                                'class' => 'btn btn-primary btn-md',
                            ];
                        }),
                ]),

        ];
    }
}
