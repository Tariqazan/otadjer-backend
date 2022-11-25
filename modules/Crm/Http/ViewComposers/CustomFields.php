<?php

namespace Modules\Crm\Http\ViewComposers;

use App\Models\Module\Module;
use Illuminate\View\View;

class CustomFields
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if (null === Module::alias('custom-fields')->enabled()->first()) {
            return;
        }
        return;

        $view->with(['custom_field_location' => 'crm.contacts', 'custom_field_model' => 'contact']);
        $view->with(['custom_field_location' => 'crm.companies', 'custom_field_model' => 'company']);
    }
}
