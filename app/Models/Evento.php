<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NumberFormatter;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'titulo',
        'descripcion',
        'lugar',
        'dia',
        'hora_inicio',
        'hora_final',
        'cupo_maximo',
        'cupo_actual',
        'tipo_inscripcion',
        'precio_presencial',
        'precio_virtual',
    ];

    protected $appends = [
        'precio_virtual_formateado',
        'precio_presencial_formateado',
    ];

    protected function casts()
    {
        return [
            'hora_inicio' => 'datetime',
            'hora_final' => 'datetime',
            'cupo_maximo' => 'integer',
            'cupo_actual' => 'integer',
            'precio_presencial' => 'double',
            'precio_virtual' => 'double',
        ];
    }

    public function ponentes()
    {
        return $this->belongsToMany(Ponente::class, 'evento_ponentes');
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }

    public function sinCupo()
    {
        if ($this->ponentes()->count() === 0) {
            return true;
        }

        return $this->cupo_actual >= $this->cupo_maximo;
    }

    public function obtenerPrecio($tipo_inscripcion)
    {
        if ($tipo_inscripcion == 'virtual') {
            return $this->precio_virtual;
        } elseif ($tipo_inscripcion == 'presencial') {
            return $this->precio_presencial;
        } else {
            return 0;
        }
    }

    // NOTE: https://documentacionlaravel.com/docs/11.x/eloquent-mutators#accessors-and-mutators
    // En este caso, se formatean los precios de los eventos.
    // Los accesores en laravel deben llevar "get" y "Attribute" para que Eloquent los reconozca automáticamente.
    public function getPrecioVirtualFormateadoAttribute()
    {
        $formatPrecio = new NumberFormatter('es_ES', NumberFormatter::CURRENCY);

        return $formatPrecio->formatCurrency($this->precio_virtual, 'EUR');
    }

    public function getPrecioPresencialFormateadoAttribute()
    {
        $formatPrecio = new NumberFormatter('es_ES', NumberFormatter::CURRENCY);

        return $formatPrecio->formatCurrency($this->precio_presencial, 'EUR');
    }
}
