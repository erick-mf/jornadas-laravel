<?php

namespace App\Repositories\Inscripcion;

use App\Models\Inscripcion;
use App\Traits\CRUDOperaciones;
use Exception;

class EloquentInscripcionRepository implements InscripcionRepositoryInterface
{
    use CRUDOperaciones;

    protected $model = Inscripcion::class;

    protected function deleteCheck(Inscripcion $inscripcion)
    {
        if ($inscripcion->evento()->exists()) {
            throw new Exception('La inscripcion tiene usuarios asociados. Por favor, elimine primero los eventos relacionados.');
        }
    }
}
