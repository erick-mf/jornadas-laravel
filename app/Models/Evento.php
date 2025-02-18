<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'titulo',
        'descripcion',
        'fecha_hora',
        'cupo_maximo',
        'cupo_actual',
    ];

    public function ponentes()
    {
        return $this->belongsToMany(Ponente::class);
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }
}
