<?php

namespace Modules\SalesPurchaseOrders\Providers;

use App\Models\Document\Document;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider as Provider;
use Modules\SalesPurchaseOrders\Console\Commands\SampleData;
use Modules\SalesPurchaseOrders\Models\PurchaseOrder\ExtraParameter as PurchaseOrderExtraParameter;
use Modules\SalesPurchaseOrders\Models\SalesOrder\ExtraParameter as SalesOrderExtraParameter;

class Main extends Provider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViews();
        $this->loadViewComponents();
        $this->loadTranslations();
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
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'sales-purchase-orders');
    }

    /**
     * Load view components.
     *
     * @return void
     */
    public function loadViewComponents()
    {
        Blade::componentNamespace('Modules\SalesPurchaseOrders\View\Components', 'sales-purchase-orders');
    }

    /**
     * Load translations.
     *
     * @return void
     */
    public function loadTranslations()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'sales-purchase-orders');
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
            Config::set(
                $config,
                array_merge_recursive(
                    Config::get($config),
                    require __DIR__ . "/../Config/{$config}.php"
                )
            );
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

        $routes = ['admin.php'];

        foreach ($routes as $route) {
            $this->loadRoutesFrom(__DIR__ . '/../Routes/' . $route);
        }
    }

    /**
     * Register dynamic relations.
     *
     * @return void
     */
    public function registerDynamicRelations()
    {
        Document::resolveRelationUsing(
            'sales_order_extra_param',
            function ($document) {
                return $document->hasOne(SalesOrderExtraParameter::class, 'document_id');
            }
        );

        Document::resolveRelationUsing(
            'purchase_order_extra_param',
            function ($document) {
                return $document->hasOne(PurchaseOrderExtraParameter::class, 'document_id');
            }
        );
    }

    public function loadCommands()
    {
        $this->commands(SampleData::class);
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
