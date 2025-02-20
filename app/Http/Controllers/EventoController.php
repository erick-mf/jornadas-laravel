<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Repositories\Evento\EventoRepositoryInterface;

class EventoController extends Controller
{
    public function __construct(private readonly EventoRepositoryInterface $eventoRepository) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventos = $this->eventoRepository->paginate(perPage: 6);

        return view('evento.index', compact('eventos'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        return view('evento.show', compact('evento'));
    }
}
