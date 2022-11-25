<?php

namespace Modules\Estimates\Http\ViewComposers;

use App\Traits\Modules;
use Illuminate\View\View;

class CustomFields
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
        if (false === $this->moduleIsEnabled('custom-fields')) {
            return;
        }

        $view->with(['custom_field_location' => 'estimates::estimates', 'custom_field_model' => 'estimate']);
    }

}
