<?php
namespace App\Providers;

use App\Repositories\EventRepository;
use App\Interfaces\EventRepositoryInterface;
use App\Repositories\TarjetaRepository;
use App\Interfaces\TarjetaRepositoryInterface;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bind the interface to an implementation repository class
     */
    public function register()
    {
        $this->app->bind(
            EventRepositoryInterface::class,
            EventRepository::class
        );
        $this->app->bind(
            TarjetaRepositoryInterface::class,
            TarjetaRepository::class
        );
    }
}