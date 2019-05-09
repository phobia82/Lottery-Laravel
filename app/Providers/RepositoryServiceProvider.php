<?php
namespace App\Providers;

use App\Repositories\EventRepository;
use App\Contracts\EventRepositoryInterface;
use App\Repositories\CardRepository;
use App\Contracts\CardRepositoryInterface;

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
            CardRepositoryInterface::class,
            CardRepository::class
        );
    }
}