<?php

namespace App\Providers;

use GuzzleHttp\Client;
use App\Services\NYTService;
use Illuminate\Support\ServiceProvider;

class NYTProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(NYTService::class, function () {
            $client = new Client();
            return new NYTService($client);
        });
    }
}
