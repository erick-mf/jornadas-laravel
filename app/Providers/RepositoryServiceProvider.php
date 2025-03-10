<?php

namespace App\Providers;

use App\Repositories\Carrito\CarritoRepositoryInterface;
use App\Repositories\Carrito\EloquentCarritoRepository;
use App\Repositories\Evento\EloquentEventoRepository;
use App\Repositories\Evento\EventoRepositoryInterface;
use App\Repositories\Inscripcion\EloquentInscripcionRepository;
use App\Repositories\Inscripcion\InscripcionRepositoryInterface;
use App\Repositories\Pago\EloquentPagoRepository;
use App\Repositories\Pago\PagoRepositoryInterface;
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
        $this->app->bind(PagoRepositoryInterface::class, EloquentPagoRepository::class);
        $this->app->bind(CarritoRepositoryInterface::class, EloquentCarritoRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
