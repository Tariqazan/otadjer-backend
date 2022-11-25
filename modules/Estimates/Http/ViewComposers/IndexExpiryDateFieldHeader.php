<?php

namespace Modules\Estimates\Http\ViewComposers;

use Illuminate\View\View;

class IndexExpiryDateFieldHeader
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
        $view->getFactory()->startPush(
            'issued_at_th_end',
            view('estimates::fields.index_expiry_date_header')
        );
    }
}
