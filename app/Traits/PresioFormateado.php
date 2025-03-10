<?php

namespace App\Traits;

use NumberFormatter;

trait PresioFormateado
{
    public function formatCurrency($precio)
    {
        $formato = new NumberFormatter('es_ES', NumberFormatter::CURRENCY);

        return $formato->formatCurrency($precio, 'EUR');
    }
}
