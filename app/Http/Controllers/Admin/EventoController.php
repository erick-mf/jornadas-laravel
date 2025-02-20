<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventoRequest;
use App\Models\Evento;
use App\Repositories\Evento\EventoRepositoryInterface;
use Illuminate\Http\RedirectResponse;

class EventoController extends Controller
{
    public function __construct(private readonly EventoRepositoryInterface $eventoRepository) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventos = $this->eventoRepository->paginate(perPage: 6);

        return view('admin.evento.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.evento.create', [
            'evento' => $this->eventoRepository->model(),
            'actionUrl' => route('admin.eventos.store'),
            'buttonText' => 'Guardar',
            'method' => 'POST',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventoRequest $request)
    {
        $data = $request->validated();

        $this->eventoRepository->create($data);

        session()->flash('success', 'Evento creado correctamente.');

        return redirect()->route('admin.eventos.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento)
    {
        return view('admin.evento.edit', [
            'evento' => $evento,
            'actionUrl' => route('admin.eventos.update', $evento),
            'buttonText' => 'Actualizar',
            'method' => 'PUT',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventoRequest $request, Evento $evento)
    {
        $data = $request->validated();
        $this->eventoRepository->update($data, $evento);

        session()->flash('success', 'Evento actualizado correctamente.');

        return redirect()->route('admin.eventos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento): RedirectResponse
    {
        try {
            $this->eventoRepository->delete($evento);
            session()->flash('success', 'Evento eliminado correctamente.');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.eventos.index');
    }
}
