<?php

namespace App\Repositories\Ponente;

use App\Models\Ponente;
use App\Traits\CRUDOperaciones;
use Exception;

class EloquentPonenteRepository implements PonenteRepositoryInterface
{
    use CRUDOperaciones;

    protected $model = Ponente::class;

    protected function deleteCheck(Ponente $ponente)
    {
        if ($ponente->eventos()->exists()) {
            throw new Exception('El ponente tiene eventos asociados. Por favor, elimine primero los eventos relacionados.');
        }
    }
}
