<?php

namespace Modules\Estimates\Http\ViewComposers;

use Illuminate\View\View;
use Modules\Estimates\Models\Estimate;

class IndexExpiryDateField
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
        if ($view->getData()['type'] !== Estimate::TYPE) {
            return;
        }

        $expire_at = $view->getData()['item']->extra_param->expire_at;

        $view->getFactory()->flushStack('issued_at_td_end');

        $view->getFactory()->startPush(
            'issued_at_td_end',
            view('estimates::fields.index_expiry_date', compact('expire_at'))
        );
    }
}
