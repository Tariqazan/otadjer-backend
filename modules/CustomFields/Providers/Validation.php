<?php

namespace Modules\CustomFields\Providers;

use App\Traits\Modules;
use Illuminate\Support\ServiceProvider;
use Modules\CustomFields\Models\Field;
use Modules\CustomFields\Models\Location;
use Modules\CustomFields\Services\Validation as ServiceValidation;

class Validation extends ServiceProvider
{
    use Modules;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['validator']->resolver(function ($translator, $data, $rules, $messages, $attributes) {
            if (!$this->moduleIsEnabled('custom-fields')) {
                return new ServiceValidation($translator, $data, $rules, $messages, $attributes);
            }

            $skips = [
                'totalItem',
                'addItem',
                'import',
                'payment',
                //'customer',
                //'vendor',
                //'field',
                'calculate',
            ];

            $path = $this->app['request']->getPathInfo();
            $paths = explode('/', $path);
            $code = '';

            if (isset($paths[2]) && isset($paths[3])) {
                $code = $paths[2] . '.' . $paths[3];
            }

            if (isset($paths[3]) && in_array($paths[3], $skips)) {
                return new ServiceValidation($translator, $data, $rules, $messages, $attributes);
            }

            $location = Location::where('code', $code)->first();

            if (empty($location)) {
                return new ServiceValidation($translator, $data, $rules, $messages, $attributes);
            }

            $custom_fields = Field::enabled()->orderBy('name')->byLocation($location->id)->get();

            if (empty($custom_fields->count())) {
                return new ServiceValidation($translator, $data, $rules, $messages, $attributes);
            }

            $request_items = request()->get('items');
            $sort_orders = ['item_custom_fields'];

            foreach ($custom_fields as $custom_field) {
                $rule = ($custom_field->rule) ? $custom_field->rule : '';

                $rule_code = $custom_field->code;

                if (!empty($request_items) && in_array($custom_field->fieldLocation->sort_order, $sort_orders)) {
                    $rule_code = 'items.*.' . $custom_field->code;
                }

                $rules[$rule_code] = $rule;
            }

            return new ServiceValidation($translator, $data, $rules, $messages, $attributes);
        });
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
