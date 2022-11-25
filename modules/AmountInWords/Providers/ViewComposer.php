<?php

namespace Modules\AmountInWords\Providers;

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
        View::composer(['components.documents.template.default',
                        'components.documents.template.classic',
                        'components.documents.template.modern',
                        ],
                        'Modules\AmountInWords\Http\ViewComposers\Document');
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
