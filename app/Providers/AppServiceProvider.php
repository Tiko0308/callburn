<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Contracts\UserInterface',
            'App\Service\UserService'
        );
        $this->app->bind(
            'App\Contracts\PostInterface',
            'App\Service\PostService'
        );
        $this->app->bind(
            'App\Contracts\MessageInterface',
            'App\Service\MessageService'
        );
         $this->app->bind(
            'App\Contracts\ImageInterface',
            'App\Service\ImageService'
        );
    }
}
