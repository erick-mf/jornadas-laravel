<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'inscripcion_id',
        'monto',
        'estado',
        'paypal_transaccion_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function precioFormateado()
    {
        $formatPrecio = new NumberFormatter('es_ES', NumberFormatter::CURRENCY);

        return Attribute::make(
            get: fn () => $formatPrecio->formatCurrency($this->monto, 'EUR'),
        );
    }
}
