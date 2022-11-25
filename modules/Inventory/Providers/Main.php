<?php

namespace Modules\Inventory\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Console\Scheduling\Schedule;
use Modules\Inventory\Console\InventorySeed;

class Main extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadConfig();
        $this->loadCommands();
        $this->loadViews();
        $this->loadMigrations();
        $this->loadTranslations();
        $this->loadViewComponents();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->loadRoutes();
    }

    /**
     * Load config.
     *
     * @return void
     */
    public function loadConfig()
    {
        $replaceConfigs = ['search-string', 'type'];

        foreach ($replaceConfigs as $config) {
            Config::set($config, array_merge_recursive(
                Config::get($config),
                require __DIR__ . "/../Config/{$config}.php"
            ));
        }
    }

    /**
     * Load view components.
     *
     * @return void
     */
    public function loadCommands()
    {
        $this->commands(\Modules\Inventory\Console\ItemReorderLevel::class);
        $this->commands(InventorySeed::class);

        $schedule_time = config('app.schedule_time', '09:00');

        $this->app->booted(function () use($schedule_time) {
            app(Schedule::class)->command('inventory:reorder_level')->dailyAt($schedule_time);
        });
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function loadViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'inventory');
    }

    /**
     * Load view components.
     *
     * @return void
     */
    public function loadViewComponents()
    {
        Blade::componentNamespace('Modules\\Inventory\\View\\Components', 'inventory');
    }

    /**
     * Load view components.
     *
     * @return void
     */
    public function loadMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function loadTranslations()
    {
        $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'inventory');
    }

     /**
     * Load routes.
     *
     * @return void
     */
    public function loadRoutes()
    {
        if (app()->routesAreCached()) {
            return;
        }

        $routes = [
            'admin.php',
        ];

        foreach ($routes as $route) {
            $this->loadRoutesFrom(__DIR__ . '/../Routes/' . $route);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
