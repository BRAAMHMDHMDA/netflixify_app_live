<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;
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
        Paginator::useBootstrapFive();
        $this->bootSettings();

        if (! $this->app->environment('local')) {
            URL::forceScheme('https');
        }
    }

    public function bootSettings(): void
    {
        $settings = Cache::get('app-settings');

        if (!$settings){
            $settings = Setting::all();
            Cache::put('app-settings', $settings);
        }

        foreach ($settings as $setting){
            if ($setting->value !== null){
                Config::set($setting->name, $setting->value);
            }
        }

    }
}
