<?php

namespace Modules\Inventory\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use App\Http\Requests\Document\Document;
use Modules\Inventory\Models\Item as InventoryItem;
use Modules\Inventory\Services\Validation as ServiceValidation;

class Validation extends ServiceProvider
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
        $request = $this->app['request'];

        if ($request->segment(3) != 'invoices') {
            return;
        }

        $this->app['validator']->resolver(function ($translator, $data, $rules, $messages, $attributes) {
            if (!empty($rules['items.*.quantity'])) {
                $rules['items.*.quantity'].= '|quantity';
            }

            if (!empty($rules['quantity'])) {
                $rules['quantity'].= '|quantity';
            }

            return new ServiceValidation($translator, $data, $rules, $messages, $attributes);
        });

        $this->app['validator']->extend('quantity', function ($attribute, $value, $parameters, &$validator) use ($request) {
            $status = true;

            if (setting('inventory.negatif_stock')) {
                return $status;
            }

            $attibutes = explode('.', $attribute);

            $item = $request['items'][$attibutes[1]];

            if (empty($item['warehouse_id'])) {
                return $status;
            }

            $inventory_stock = InventoryItem::where('item_id', $item['item_id'])
                                            ->where('warehouse_id', $item['warehouse_id'])
                                            ->value('opening_stock');

            if (empty($inventory_stock)) {
                return $status;
            }

            if ($item['quantity'] > $inventory_stock) {
                $status = false;

                $validator->fallbackMessages['quantity'] = trans('inventory::general.invalid_stock', ['stock' => $inventory_stock]);
            }

            return $status;
        },
            trans('inventory::general.invalid_stock', ['stock' => 0])
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
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
