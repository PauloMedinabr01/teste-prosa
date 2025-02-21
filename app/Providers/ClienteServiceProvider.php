<?php

namespace App\Providers;

use App\Interfaces\ClienteRepositoryInterface;
use App\Repository\ClienteRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Class ClienteServiceProvider
 * @package App\Providers
 */
class ClienteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            ClienteRepositoryInterface::class,
            ClienteRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
