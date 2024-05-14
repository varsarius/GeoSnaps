<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\AdminPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::defaultView('vendor.pagination.bootstrap-5');
        \Illuminate\Support\Facades\App::setLocale(\Illuminate\Support\Facades\Session::get('locale'));

        Gate::policy(User::class, AdminPolicy::class);
    }
}
