<?php

namespace Modules\Inventory\Http\ViewComposers;

use Illuminate\View\View;
use App\Traits\Modules;

class ComponentReorderLevel
{
    use Modules;

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if (!$this->moduleIsEnabled('inventory')) {
            return;
        }

        if (user()->cannot('read-common-notifications')) {
            return;
        }

        $view->getFactory()->startPush('end', view('inventory::components.content'));
    }
}
