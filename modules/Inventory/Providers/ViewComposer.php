<?php

namespace Modules\Inventory\Providers;

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
        View::composer(['components.documents.form.line-item'
        ], 'Modules\Inventory\Http\ViewComposers\DocumentItem');

        View::composer([
            'components.documents.template.line-item',
        ], 'Modules\Inventory\Http\ViewComposers\DocumentShow');

        View::composer(['partials.admin.navbar'
        ], 'Modules\Inventory\Http\ViewComposers\ItemReorderLevel');

        View::composer(['common.notifications.index'
        ], 'Modules\Inventory\Http\ViewComposers\ComponentReorderLevel');

        if (null !== module('custom-fields')) {
            View::composer(
                [
                    'inventory::items.create',
                    'inventory::items.edit',
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
