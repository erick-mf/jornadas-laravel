<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InscripcionRequest;
use App\Models\Inscripcion;
use App\Repositories\Inscripcion\InscripcionRepositoryInterface;

class InscripcionController extends Controller
{
    public function __construct(private readonly InscripcionRepositoryInterface $inscripcionRepository) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inscripciones = $this->inscripcionRepository->paginate(perPage: 6);

        return view('admin.inscripcion.index', compact('inscripciones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inscripcion $inscripcion)
    {
        return view('admin.inscripcion.edit', [
            'inscripcion' => $inscripcion,
            'actionUrl' => route('admin.inscripciones.update', $inscripcion),
            'buttonText' => 'Actualizar',
            'method' => 'PUT',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InscripcionRequest $request, Inscripcion $inscripcion)
    {
        $data = $request->validated();
        $this->inscripcionRepository->update($data, $inscripcion);
        session()->flash('success', 'Inscripcion actualizado correctamente.');

        return redirect()->route('admin.inscripciones.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inscripcion $inscripcion)
    {
        try {
            $this->inscripcionRepository->delete($inscripcion);
            session()->flash('success', 'Inscripcion eliminado correctamente.');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.inscripciones.index');
    }
}
