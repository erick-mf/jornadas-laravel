<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'evento_id',
        'precio_pagado',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }

    public function getEventos()
    {
        return Evento::query()
            ->orderBy('dia', 'desc')
            ->get();
    }

    public function precioPagado()
    {
        $this->precio_pagado = $this->evento->obtenerPrecio($this->tipo_inscripcion);
    }
}
