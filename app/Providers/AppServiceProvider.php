<?php

namespace App\Providers;

use App\Models\DataProker;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

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
        Filament::serving(function () {

            // Filament::registerPages([
            //     DataProker::class,  // Register the custom page
            // ]);

            Filament::registerNavigationGroups([
                NavigationGroup::make()
                    ->label('Proker'),
                    // ->icon('heroicon-s-pencil'),
                NavigationGroup::make()
                    ->label('Acc Proker'),
                    // ->hidden(fn () => Auth::user()->role_id === 2 ||  Auth::user()->role_id === 3),
                    // ->icon('heroicon-s-cog')
                    // ->collapsed(),
                NavigationGroup::make()
                     ->label('Master Data'),
                    //  ->icon('heroicon-s-shopping-cart'),
            ]);
        });

       
    }
}
