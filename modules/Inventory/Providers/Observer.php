<?php

namespace Modules\Inventory\Providers;

use App\Models\Common\Item;
use App\Models\Document\DocumentItem;
use App\Models\Document\Document;

use Illuminate\Support\ServiceProvider;

class Observer extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        Document::observe('Modules\Inventory\Observers\Document\Document');
        DocumentItem::observe('Modules\Inventory\Observers\Document\DocumentItem');
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
