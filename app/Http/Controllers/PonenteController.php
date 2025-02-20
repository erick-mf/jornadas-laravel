<?php

namespace App\Http\Controllers;

use App\Models\Ponente;
use App\Repositories\Ponente\PonenteRepositoryInterface;

class PonenteController extends Controller
{
    public function __construct(private readonly PonenteRepositoryInterface $ponenteRepository) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ponentes = $this->ponenteRepository->paginate(perPage: 6);

        return view('ponente.index', compact('ponentes'));
    }

    public function show(Ponente $ponente)
    {
        return view('ponente.show', compact('ponente'));
    }
}
