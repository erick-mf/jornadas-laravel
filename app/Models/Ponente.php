<?php

namespace App\Models;

use App\Services\UploadService;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ponente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'foto',
        'areas_experiencia',
        'redes_sociales',
    ];

    public function eventos()
    {
        return $this->belongsToMany(Evento::class);
    }

    public function imagenUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => UploadService::url($this->foto),
        );
    }
}
