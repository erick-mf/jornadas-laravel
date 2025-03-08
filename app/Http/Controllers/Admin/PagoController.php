<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Pago\PagoRepositoryInterface;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function __construct(private readonly PagoRepositoryInterface $pagoRepository) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagos = $this->pagoRepository->paginate(perPage: 12);
        $totalDePagos = $this->pagoRepository->totalFormateado();

        return view('admin.pagos.index', compact('pagos', 'totalDePagos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
