<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Support\ErrorContainer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->scoped(ErrorContainer::class, function () {
            return new ErrorContainer();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
