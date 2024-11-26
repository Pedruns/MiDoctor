<?php

namespace App\Livewire;

use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Gate;


class FormularioMedico extends Component
{
    use WithFileUploads;
    
    public $especialidad;
    public $cedula;
    public $consultorio;
    public $acerca;
    public $ruta_archivo;
    
    public function render()
    {
        return view('livewire.formulario-medico');
    }

    public function guardarFormulario(){
        
        Gate::authorize('create', Doctor::class);
        $this->validate([
            'especialidad' => 'required|string',
            'cedula' => 'required|string',
            'consultorio' => 'required|string',
            'acerca' => 'nullable|string',
            'ruta_archivo' => 'required|file|mimes:pdf,jpg,png|max:2048',
        ]);

        $doctor = new Doctor();
        $doctor->especialidad = $this->especialidad;
        $doctor->cedula = $this->cedula;
        $doctor->consultorio = $this->consultorio;
        $doctor->acerca = $this->acerca;
        $doctor->ruta_archivo = $this->ruta_archivo->store('');
        $doctor->user_id = Auth::id();
        $doctor->estado = "pendiente";
        $doctor->save();     

        session()->flash('message', 'Formulario guardado exitosamente.');
   
        return redirect()->route('bienvenida');  
    }
}
