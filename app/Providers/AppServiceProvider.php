<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Ensure Cloudinary SDK classes are autoloadable even if the composer
        // classmap is stale on production (the SDK uses classmap, not PSR-4).
        spl_autoload_register(function (string $class): void {
            if (!str_starts_with($class, 'Cloudinary\\')) {
                return;
            }
            $relative = str_replace('Cloudinary\\', '', $class);
            $relative = str_replace('\\', DIRECTORY_SEPARATOR, $relative);
            $path = base_path('vendor/cloudinary/cloudinary_php/src/' . $relative . '.php');
            if (file_exists($path)) {
                require_once $path;
            }
        }, prepend: true);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
