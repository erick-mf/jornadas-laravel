<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Inscripcion;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Evento $evento)
    {
        $user = $request->user();

        if ($evento->sinCupo()) {
            session()->flash('error', 'El evento no tiene cupos disponibles.');

            return back();
        }
        if ($evento->tipo === 'conferencia' && ! $user->limiteDeConferencias()) {
            session()->flash('error', 'Has alcanzado el límite de inscripciones para conferencias.');

            return back();
        }

        if ($evento->tipo === 'taller' && ! $user->limiteDeTalleres()) {
            session()->flash('error', 'Has alcanzado el límite de inscripciones para talleres.');

            return back();
        }

        $inscripcion = new Inscripcion([
            'evento_id' => $evento->id,
            'user_id' => $user->id,
        ]);

        $inscripcion->save();
        $evento->cupo_actual++;
        $evento->save();

        session()->flash('success', 'Inscripción creada correctamente.');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Inscripcion $inscripcion)
    {
        if ($request->user()->id !== $inscripcion->user_id) {
            session()->flash('error', 'No tienes permiso para eliminar esta inscripción.');

            return redirect()->route('dashboard');
        }

        $evento = $inscripcion->evento;
        $evento->cupo_actual--;
        $evento->save();
        $inscripcion->delete();

        session()->flash('success', 'Inscripción eliminada correctamente.');

        return back();
    }
}
