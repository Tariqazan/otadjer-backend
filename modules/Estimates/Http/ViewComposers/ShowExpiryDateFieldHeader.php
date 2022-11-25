<?php

namespace Modules\Estimates\Http\ViewComposers;

use Illuminate\View\View;

class ShowExpiryDateFieldHeader
{

    /**
     * Bind data to the view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $expire_at = $view->getData()['estimate']->extra_param->expire_at;

        $view->getFactory()->startPush(
            'header_due_at_start',
            view('estimates::fields.show_expiry_date_header', compact('expire_at'))
        );
    }

}
