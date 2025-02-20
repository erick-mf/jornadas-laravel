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

    protected function casts()
    {
        return [
            'fecha_hora' => 'datetime',
            'cupo_maximo' => 'integer',
            'cupo_actual' => 'integer',
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
}
