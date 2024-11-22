<?php

namespace App\Http\Controllers;

use App\Models\Cita;
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
        return view('citas.index', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('citas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Auth::user()){
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
            $cita->medico_id = 2;
            
            $cita->save();

            return view('bienvenida');
        }
        dd($request);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Cita $cita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cita $cita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cita $cita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cita $cita)
    {
        //
    }
}
