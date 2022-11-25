<?php

namespace Modules\Estimates\Providers;

use App\Models\Common\Company;
use App\Models\Setting\Category;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider as Provider;
use Modules\Estimates\Console\Commands\EstimateExpiry;
use Modules\Estimates\Console\Commands\EstimateReminder;
use Modules\Estimates\Console\Commands\SampleData;
use Modules\Estimates\Models\Estimate;

class Main extends Provider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslations();
        $this->loadViews();
        $this->loadMigrations();
        $this->loadCommands();
        $this->loadConfig();
        $this->registerDynamicRelations();
        $this->publishAssets();
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
     * Load views.
     *
     * @return void
     */
    public function loadViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'estimates');
    }

    /**
     * Load translations.
     *
     * @return void
     */
    public function loadTranslations()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'estimates');
    }

    /**
     * Load migrations.
     *
     * @return void
     */
    public function loadMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Load config.
     *
     * @return void
     */
    public function loadConfig()
    {
        $replaceConfigs = ['type', 'setting', 'search-string'];

        foreach ($replaceConfigs as $config) {
            Config::set($config, array_merge_recursive(
                Config::get($config),
                require __DIR__ . "/../Config/{$config}.php"
            ));
        }
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
            'portal.php',
            'signed.php',
        ];

        foreach ($routes as $route) {
            $this->loadRoutesFrom(__DIR__ . '/../Routes/' . $route);
        }
    }

    public function loadCommands()
    {
        $this->commands(EstimateReminder::class);
        $this->commands(SampleData::class);
        $this->commands(EstimateExpiry::class);

        $scheduleTime = env('APP_SCHEDULE_TIME', '09:00');

        $this->app->booted(function () use ($scheduleTime) {
            app(Schedule::class)->command('estimates:reminder')->dailyAt($scheduleTime);
            app(Schedule::class)->command('estimates:check_estimate_expiry')->dailyAt($scheduleTime);

        });
    }

    /**
     * Register dynamic relations.
     *
     * @return void
     */
    public function registerDynamicRelations()
    {
        Category::resolveRelationUsing('estimates', function ($category) {
            return $category->hasMany(Estimate::class)->where('type', Estimate::TYPE);
        });

        Company::resolveRelationUsing('estimates', function ($company) {
            return $company->hasMany(Estimate::class)->where('type', Estimate::TYPE);
        });
    }

    public function publishAssets()
    {
        $this->publishes(
            [
                __DIR__ . '/../Resources/assets' => public_path('files/import'),
            ],
            'public'
        );
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
