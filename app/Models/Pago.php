<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NumberFormatter;

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

    protected $appends = ['precio_formateado'];

    protected function casts()
    {
        return [
            'monto' => 'double',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function inscripciones()
    {
        return $this->belongsTo(Inscripcion::class);
    }

    public function getPrecioFormateadoAttribute()
    {
        $formatPrecio = new NumberFormatter('es_ES', NumberFormatter::CURRENCY);

        return Attribute::make(
            get: fn () => $formatPrecio->formatCurrency($this->monto, 'EUR'),
        );
    }
}
