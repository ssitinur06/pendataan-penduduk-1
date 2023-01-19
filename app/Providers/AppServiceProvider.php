<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('ketuart', fn(User $user) => $user->level === 1); //ketua rt
        Gate::define('sekretaris', fn(User $user) => $user->level === 2); //sekretaris
        Gate::define('bendahara', fn(User $user) => $user->level === 3); //bendahara

        Paginator::useBootstrap();

    }
}
