<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PonenteRequest;
use App\Models\Ponente;
use App\Repositories\Ponente\PonenteRepositoryInterface;
use Illuminate\Http\RedirectResponse;

class PonenteController extends Controller
{
    public function __construct(private readonly PonenteRepositoryInterface $ponenteRepository) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ponentes = $this->ponenteRepository->paginate(perPage: 6);

        return view('admin.ponente.index', compact('ponentes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ponente.create', [
            'ponente' => $this->ponenteRepository->model(),
            'actionUrl' => route('admin.ponentes.store'),
            'buttonText' => 'Guardar',
            'method' => 'POST',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PonenteRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->ponenteRepository->create($data);

        session()->flash('success', 'Ponente creado correctamente.');

        return redirect()->route('admin.ponentes.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ponente $ponente)
    {
        return view('admin.ponente.edit', [
            'ponente' => $ponente,
            'actionUrl' => route('admin.ponentes.update', $ponente),
            'buttonText' => 'Actualizar',
            'method' => 'PUT',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PonenteRequest $request, Ponente $ponente)
    {
        $data = $request->validated();

        $this->ponenteRepository->update($data, $ponente);
        session()->flash('success', 'Ponente actualizado correctamente.');

        return redirect()->route('admin.ponentes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ponente $ponente): RedirectResponse
    {
        try {
            $this->ponenteRepository->delete($ponente);
            session()->flash('success', 'Ponente eliminado correctamente.');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.ponentes.index');
    }
}
