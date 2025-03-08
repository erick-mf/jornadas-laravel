<?php

namespace App\Repositories\Pago;

use App\Models\Pago;
use App\Traits\CRUDOperaciones;
use Exception;
use NumberFormatter;

class EloquentPagoRepository implements PagoRepositoryInterface
{
    use CRUDOperaciones;

    protected $model = Pago::class;

    protected function deleteCheck(Pago $pago)
    {
        if ($pago->inscripciones()->exists()) {
            throw new Exception('El pago tiene inscripciones asociadas. Por favor, elimine primero las inscripciones relacionadas.');
        }
    }

    public function totalDePagos()
    {
        $totalDePagos = Pago::query()->sum('monto');

        return $totalDePagos;
    }

    public function totalFormateado()
    {
        $formatTotalDePagos = new NumberFormatter('es_ES', NumberFormatter::CURRENCY);
        $total = $this->totalDePagos();

        return $formatTotalDePagos->formatCurrency($total, 'EUR');
    }
}
