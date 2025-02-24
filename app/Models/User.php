<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nombre',
        'email',
        'password',
        'rol',
        'cuenta_confirmada',
        'token_confirmacion',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'cuenta_confirmada' => 'boolean',
            'token_confirmacion' => 'string',
        ];
    }

    public function inscripciones(): HasMany
    {
        return $this->hasMany(Inscripcion::class);
    }

    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'inscripcions');
    }

    public function limiteDeConferencias()
    {
        return $this->eventos()->where('tipo', 'conferencia')->count() < 5;
    }

    public function limiteDeTalleres()
    {
        return $this->eventos()->where('tipo', 'taller')->count() < 4;
    }

    public function esEstudiante($email = null)
    {
        $email = $email ?? $this->email;

        return Estudiante::query()->where('email', $email)->exists();
    }

    public function pagos(): HasMany
    {
        return $this->hasMany(Pago::class);
    }
}
