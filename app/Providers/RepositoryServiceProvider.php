<?php

namespace App\Providers;

use App\Repositories\Evento\EloquentEventoRepository;
use App\Repositories\Evento\EventoRepositoryInterface;
use App\Repositories\Inscripcion\EloquentInscripcionRepository;
use App\Repositories\Inscripcion\InscripcionRepositoryInterface;
use App\Repositories\Ponente\EloquentPonenteRepository;
use App\Repositories\Ponente\PonenteRepositoryInterface;
use App\Repositories\User\EloquentUserRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, EloquentUserRepository::class);
        $this->app->bind(PonenteRepositoryInterface::class, EloquentPonenteRepository::class);
        $this->app->bind(EventoRepositoryInterface::class, EloquentEventoRepository::class);
        $this->app->bind(InscripcionRepositoryInterface::class, EloquentInscripcionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
