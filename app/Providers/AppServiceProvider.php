<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ProfilDesa;
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
         View::composer('*', function ($view) {
            $profilDesa = ProfilDesa::published()->first();
            $view->with('profilDesa', $profilDesa);
        });
         View::composer('*', function ($view) {
            $profilDesa = ProfilDesa::where('is_published', true)->first();
            
            if (!$profilDesa) {
                $profilDesa = ProfilDesa::first();
            }
            
            $view->with('profilDesa', $profilDesa);
        });
    }
}
