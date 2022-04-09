<?php

namespace App\Providers;

use App\Repository\BaseRepository;
use App\Repository\Contracts\BaseRepositoryContract;
use App\Repository\Contracts\TicketRepositoryContract;
use App\Repository\TicketRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    private const CLASSES = [
        TicketRepositoryContract::class => TicketRepository::class,
        BaseRepositoryContract::class => BaseRepository::class,
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach (self::CLASSES as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
