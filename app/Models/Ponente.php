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
        'image',
        'areas_experiencia',
        'redes_sociales',
    ];

    protected function casts()
    {
        return [
            'areas_experiencia' => 'array',
            'redes_sociales' => 'array',
        ];
    }

    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'evento_ponentes');
    }

    protected function imagenUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => UploadService::url($this->image),
        );
    }
}
