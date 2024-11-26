<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citas = Cita::with('medico')->where('paciente_id', Auth::id())->get();
        return view('cita.index', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function crear(User $medico)
    {
        return view('cita.crear', compact('medico'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'tipo' => 'required|string|in:Presencial,En linea',
            'notas' => 'required|string',
        ]);

        $cita = new Cita();

        $cita->fecha = $request->fecha;
        $cita->hora = $request->hora;
        $cita->tipo = $request->tipo;
        $cita->notas = $request->notas;
        $cita->estado = "pendiente";
        $cita->paciente_id = Auth::id();
        $cita->medico_id = $request->medico_id;

        $cita->save();

        return redirect()->action([CitaController::class, 'index']);
    }

    // public function show(Cita $cita)
    // {
    //     //
    // }

    public function edit($cita_id)
    {
        $cita = Cita::findOrFail($cita_id);
        Gate::authorize('propietario', $cita);
        return view('cita.editar', compact('cita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $cita_id)
    {
        $cita = Cita::findOrFail($cita_id);
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'tipo' => 'required|string|in:Presencial,En linea',
            'notas' => 'required|string',
        ]);


        $cita->fecha = $request->fecha;
        $cita->hora = $request->hora;
        $cita->tipo = $request->tipo;
        $cita->notas = $request->notas;
        $cita->estado = "pendiente";
        $cita->paciente_id = Auth::id();
        $cita->medico_id = $request->medico_id;

        $cita->save();

        return redirect()->action([CitaController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($cita_id)
    {
        $cita = Cita::findOrFail($cita_id);
        Gate::authorize('propietario', $cita);
        $cita->delete();
        return back();
    }
}
