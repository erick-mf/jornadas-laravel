<?php

namespace App\Repositories\Evento;

use App\Models\Evento;
use App\Traits\CRUDOperaciones;
use Exception;

class EloquentEventoRepository implements EventoRepositoryInterface
{
    use CRUDOperaciones;

    protected $model = Evento::class;

    protected function deleteCheck(Evento $evento)
    {
        if ($evento->ponentes()->exists()) {
            throw new Exception('El evento tiene ponentes asociados..');
        }
    }
}
