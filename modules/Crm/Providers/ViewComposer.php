<?php

namespace Modules\Crm\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class ViewComposer extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['sales.customers.create', 'sales.customers.edit'], 'Modules\Crm\Http\ViewComposers\Customer');

        if (null !== module('custom-fields')) {
            View::composer(
                [
                    'crm::contacts.create',
                    'crm::contacts.edit',
                    'crm::companies.create',
                    'crm::companies.edit',
                ],
                'Modules\CustomFields\Http\ViewComposers\Field'
            );
        }
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
}
