<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\SiteSetting;

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
        try {
            if (Schema::hasTable('site_settings')) {
                $generalSettings = SiteSetting::getGroup('general');
                $contactSettings = SiteSetting::getGroup('contact');
                
                View::share('generalSettings', $generalSettings);
                View::share('contactSettings', $contactSettings);
            }
        } catch (\Exception $e) {
            // Catch error if DB doesn't exist yet, needed for first migrations
        }
    }
}
