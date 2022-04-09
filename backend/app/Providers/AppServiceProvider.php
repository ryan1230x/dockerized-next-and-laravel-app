<?php

namespace App\Providers;

use App\Services\Contracts\TicketServiceContract;
use App\Services\TicketService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    private const CLASSES = [
        TicketServiceContract::class => TicketService::class,
    ];

    /**
     * bind contracts to service classes
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
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
