<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }
        Gate::define('view-dashboard', function (User $user) {
            return $user->role === 'admin';
        });
        Gate::define('manage-products', function (User $user) {
            return $user->role === 'admin';
        });

        // Gate for KategoriController
        Gate::define('manage-categories', function (User $user) {
            return $user->role === 'admin';
        });

        // Gate for PetaniController
        Gate::define('manage-farmers', function (User $user) {
            return $user->role === 'admin';
        });
    }
}
